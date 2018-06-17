<?php

namespace App\Http\Controllers\Auth;

use App\GroupInvite;
use App\Mail\ConfirmEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Process\Exception\LogicException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'position' => $data['position'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Send confirmation mail to user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if ($invite = GroupInvite::query()->where('email', $user->email)->first()) {
            $user->groups()->attach($invite->group_id);
            $user->is_confirmed = true;
            $invite->delete();

            return redirect()->route('login');
        }

        \Mail::to($user)->send(new ConfirmEmail($user));

        return redirect()->route('login')->with('registered', true);
    }

    /**
     * Confirm user's email
     *
     * @param $id
     * @param $token
     * @param Encrypter $encrypter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmation($id, $token, Encrypter $encrypter)
    {
        $user = User::find($id);

        if (!$user) {
            throw new NotFoundHttpException('User with target id not found');
        }

        if ((int)$user->email !== (int)$encrypter->decrypt($token)) {
            throw new UnprocessableEntityHttpException('Invalid confirmation token');
        }

        if ($user->is_confirmed) {
            throw new LogicException('User e\'mail already confirmed');
        }

        $user->is_confirmed = true;
        $user->save();

        return redirect()->route('login')->with('confirmed', true);
    }
}
