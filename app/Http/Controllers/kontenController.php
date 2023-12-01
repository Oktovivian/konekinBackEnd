<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kontenController extends Controller
{
    // CREATE CONTENT
    public function createContent(Request $request)
    {
        // Validate the request data
        $request->validate([
            'idKreator' => 'required',
            'videoTitle' => 'required',
            'videoDescription' => 'required',
            'videoDuration' => 'required',
            'videoPrice' => 'required',
            'videoURL' => 'required',
            'videoThumbnail' => 'required',
            'videoKategori' => 'required',
        ]);

        // Create a new Konten
        $konten = Konten::create($request->all());

        return response()->json(['message' => 'Content created successfully', 'data' => $konten], 201);
    }

    // UPDATE CONTENT
    public function updateContent(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'idKreator' => 'required',
            'videoTitle' => 'required',
            'videoDescription' => 'required',
            'videoDuration' => 'required',
            'videoPrice' => 'required',
            'videoURL' => 'required',
            'videoThumbnail' => 'required',
            'videoKategori' => 'required',
        ]);

        // Find the Konten by ID
        $konten = Konten::findOrFail($id);

        // Update Konten
        $konten->update($request->all());

        return response()->json(['message' => 'Content updated successfully', 'data' => $konten]);
    }

    // DELETE CONTENT
    public function deleteContent($id)
    {
        // Find the Konten by ID
        $konten = Konten::findOrFail($id);

        // Delete Konten
        $konten->delete();

        return response()->json(['message' => 'Content deleted successfully']);
    }

    // SHOW CONTENT
    public function showContent($id)
    {
        // Find the Konten by ID
        $konten = Konten::findOrFail($id);

        return response()->json(['data' => $konten]);
    }

    // SHOW LIST CONTENT
    public function listContent()
    {
        // Get all Konten
        $kontenList = Konten::all();

        return response()->json(['data' => $kontenList]);
    }
}
