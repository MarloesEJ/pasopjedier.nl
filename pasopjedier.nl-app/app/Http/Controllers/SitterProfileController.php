<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitterProfileController extends Controller
{
    public function storeMedia(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|mimes:jpg,jpeg,png,mp2,mov|max:20000', // Max 20MB
        ]);
        
        if($request->hasFile('file')){
            $path = $request->file('file')->store('sitter_media', 'public');

            \App\Models\Media::create([
                'model_type' => 'App\Models\SitterProfile',
                'model_id' => auth()->user()->sitterProfile->id,
                'file_path' => $path,
                'file_type' => $request->file('file')->getClientOriginalExtension(),
            ]);
        }
        return back()->with('success', 'Media succesvol geüpload.');
    }

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'media_file' => 'required|mimes:jpg,jpeg,png,mp2,mov|max:20000', // Max 20MB
        ]);
        
        $path = $request->file('media_file')->store('sitter_media', 'public');

        auth()->user()->sitterProfile->media()->create([
            'file_path' => $path,
            'file_type' => $request->file('media_file')->getClientOriginalExtension(),
            'model_type' => 'App\Models\SitterProfile',  
        ]);
        return back()->with('success', 'Media succesvol geüpload.');
    }
}
