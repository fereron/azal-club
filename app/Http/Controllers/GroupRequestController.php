<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupRequestController extends Controller
{

    public function delete(Request $request)
    {
        $request->user()->requestToGroup()->where('group_id', $request->input('group_id'))->first()->delete();

        return back()->with('request_deleted', true);
    }


}
