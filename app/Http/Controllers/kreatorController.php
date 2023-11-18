<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kreatorController extends Controller
{
    // EDIT PROFILE
    public function editProfile(Request $request, $idKreator)
    {
        // Proses logika pengeditan profil kreator
        $kreator = Kreator::find($idKreator);

        // Pastikan $kreator tidak null sebelum melakukan update
        if ($kreator) {
            $kreator->update($request->only([
                'password',
                'username',
                'noHP',
                'email',
                'cv',
                'bio',
                'socMed',
                'rekening',
                'profilPict',
            ]));

            return response()->json(['message' => 'Profile updated successfully']);
        } else {
            return response()->json(['message' => 'Kreator not found'], 404);
        }
    }



    // UPLOAD CV
    public function uploadCV(Request $request, $idKreator)
    {
        // Proses logika pengunggahan CV
        $kreator = Kreator::find($idKreator);

        // Pastikan $kreator tidak null sebelum melakukan update
        if ($kreator) {
            $kreator->update(['cv' => $request->file('cv')->store('cv_files')]);

            return response()->json(['message' => 'CV uploaded successfully']);
        } else {
            return response()->json(['message' => 'Kreator not found'], 404);
        }
    }


    // SHOW PROFILE
    //menampilkan profile kreator tergantung yg diminta di UI

    public function showProfile($idKreator)
    {
        // Menampilkan profile kreator
        $kreator = Kreator::find($idKreator);

        // Pastikan $kreator tidak null sebelum menampilkan
        if ($kreator) {
            return response()->json(['profile' => $kreator]);
        } else {
            return response()->json(['message' => 'Kreator not found'], 404);
        }
    }

    
}
