<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\OppasRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(OppasRequest $oppasRequest)
    {
        if(Auth::id() !== $oppasRequest->owner_id){
            abort(403);
        }

        $acceptedResponse = $oppasRequest->responces()->where('status', 'accepted')->first();

        return view('reviews.create', compact('oppasRequest', 'acceptedResponse'));
    }

    public function store(Request $request, OppasRequest $oppasRequest)
    {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $acceptedResponse = $oppasRequest->responses()->where('status', 'accepted')->first();

        Review::create([
            'oppas_request_id' => $oppasRequest->id,
            'author_id' => Auth::id(),
            'target_user_id' => $acceptedResponse->sitter_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('requests.index')->with('success', 'Review succesvol toegevoegd.');
    }
}
