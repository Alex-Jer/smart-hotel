<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->location) return response('ERROR: Must have a [location] parameter!', 400);

        $image = $request->file('image');
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/bmp']; // Allowed file formats

        // If the image wasn't found
        if (!$image) return response('ERROR: Image not found!', 400);

        // If the file sent was a forbidden file type
        if (!in_array($image->getMimeType(), $allowedMimeTypes)) return response('ERROR: Invalid file type!', 400);

        // Rename and move the file to the storage directory
        return $image->move('storage/' . $request->location, $image->getClientOriginalName());
    }
}
