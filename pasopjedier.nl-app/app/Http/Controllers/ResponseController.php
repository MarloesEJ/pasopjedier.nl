<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OppasRequest;
use App\Models\Response;

class ResponseController extends Controller
{
    public function store(Request $request, OppasRequest $oppasRequest)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'proposed_rate' => 'nullable|numeric|min:0',
        ]);

        Response::create([
            'oppas_request_id' => $oppasRequest->id,
            'sitter_id' => Auth::id(),
            'message' => $request->input('message'),
            'proposed_rate' => $request->input('proposed_rate'),
            'status' => 'pending',
        ]);

        return back()->with('success', 'Je reactie is succesvol verzonden!');
    }

    public function accept(Response $response)
    {
        if(Auth::id() !== $response->request->owner_id) {
            abort(403);
        }

        $response->update(['status' => 'accepted']);

        $response->request->update(['status' => 'accepted']);

        $response->request->responses()
            ->where('id', '!=', $response->id)
            ->update(['status' => 'rejected']);
        
        return back()->with('success', 'Je hebt de oppasreactie geaccepteerd.');
    }
}
