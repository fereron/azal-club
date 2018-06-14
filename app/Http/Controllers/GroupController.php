<?php

namespace App\Http\Controllers;

use App\Group;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GroupController extends Controller
{
    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * GroupController constructor.
     * @param GroupRepository $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * All user's groups page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $groups = auth()->user()->groups()->with('members')->get();

        return view('dashboard.groups.index', compact('groups'));
    }

    public function show($group_id)
    {
        $group = $this->groupRepository->with(['posts.author', 'posts.comments.author', 'members'])->find($group_id);
        $members = $group->members;

        $user = $members->where('id', auth()->id())->first();

        $members = $members->reject(function ($member) {
            return $member->id == auth()->id();
        });

        if (!$user) {
            $request = $group->requests()->where('user_id', auth()->id())->first();
        }

        return view('dashboard.groups.group', [
            'group' => $group,
            'user' => $user,
            'members' => $members,
            'pending_request' => $request ?? null
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|string|max:255',
        ]);

        $group = $this->groupRepository->createGroup($request);

        return redirect()->route('group.show', [$group->id]);
    }

    public function edit(Group $group)
    {
        if (!auth()->user()->isAdmin($group->id)) {
            throw new AccessDeniedHttpException('You don\'t have access to this page');
        }

        return view('dashboard.groups.edit', compact('group'));
    }

    /**
     * Handle update form request
     *
     * @param $group_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($group_id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $this->groupRepository->updateGroup($group_id, $request);

        return back()->with('updated', true);
    }

    public function delete(Request $request)
    {
        $this->groupRepository->deleteGroup($request->input('id'));

        return response()->json(['success' => true], 200);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (is_null($query)) {
            return back();
        }

        $group = $this->groupRepository->findBy('name', $query);

        if ($group) {
            return redirect()->route('group.show', [$group->id]);
        }

        return redirect()->route('groups.search.view', ['q' => $query]);
    }

    public function searchView()
    {
        if (is_null(request('q'))) {
            return redirect()->route('groups');
        }

        $groups = $this->groupRepository->searchFromRequest(request('q'));

        return view('dashboard.groups.index', compact('groups'));
    }

    public function requests($group_id)
    {
        $group = $this->groupRepository->with(['requests.user'])->find($group_id);

        return view('dashboard.groups.requests', compact('group'));
    }

}
