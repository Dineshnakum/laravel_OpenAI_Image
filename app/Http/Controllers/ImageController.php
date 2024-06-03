<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;

class ImageController extends Controller
{
    public function prompt()
    {
        return view('prompt');
    }

    public function viewimage(Request $request){
        $imageData = $request->imageData;
        return view('imageview', compact('imageData'));
    }   

    public function generate(Request $request)
    {
        $prompt = $request->prompt;

        $response = OpenAI::images()->create([
            "prompt" => $prompt,
            "n" => 1,
            "size" => "512x512",
            "response_format" => "url",
        ]);
        // dd($response);

        $imageData = $response['data'][0]['url'];
        return redirect()->route('viewimage', compact('imageData'));
    }

    public function findobject(Request $request){
        $prompt = $request->prompt;
        $imagePath = $request->file('image')->store('image', 'public');
        $imageBase64 = base64_encode($imagePath);
        $stored = basename($imagePath);
        // return $stored;

        $response = OpenAI::images()->edit([
            "image" => fread($stored),
            "prompt" => $prompt,
            "n" => 1,
            "response_format" => "url",
        ]);
        dd($response);
    }
}
