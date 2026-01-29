<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OppasRequest;
use App\Models\Block;

class AdminController extends Controller
{
    public function dashboard(){
        $users = User::all();
        $requests = OppasRequest::all();
        return view('admin.dashboard', compact('users', 'requests'));
    }

    public function blockUser(Request $request, User $user)
    {
        Block::create([
            'blocker_id' => auth()->id(),
            'blocked_id' => $user->id,
            'reason' => 'Geblokkeerd door admin'
        ]);
        
        return back()->with('success', 'Gebruiker '.$user->name . ' is geblokkeerd.');
    }

    public function deleteRequest(OppasRequest $request)
    {
        $request->delete();
        return back()->with('success', 'Oppasverzoek is verwijderd.');
    }
}
