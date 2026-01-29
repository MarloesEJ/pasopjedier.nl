<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OppasRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = OppasRequest::query()->where('status', 'open');
        
        if($request->has('species') && $request->species != '') {
            $query->whereHas('pet', function($q) use ($request) {
                $q->where('species', $request->species);
            });
        }

        $requests = $query->with(['pet', 'owner'])->latest()->get();

        return view('oppas_requests.index', compact('requests'));
    }

    public function show(OppasRequest $oppasRequest)
    {
        return view('oppas_requests.show', compact('oppasRequest'));
    }
}
