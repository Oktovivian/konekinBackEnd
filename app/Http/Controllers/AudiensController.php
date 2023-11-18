<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudiensController extends Controller
{
    // SHOW PROFILE
    //menampilkan profile audiens tergantung yg diminta di UI
    public function showProfile()
    {
        // Display the audience's profile
        $audience = Audiens::find(auth()->id());

        return response()->json(['profile' => $audience]);
    }
    


    // BUY CONTENT
    public function buyContent(Request $request)
    {
        // Process the purchase logic here
        // You can access data from the request using $request->input('key')

        return response()->json(['message' => 'Content purchased successfully']);
    }


    
    // SHOW CONTENT
    //menampilkan content yang telah dibeli oleh audiens
    public function watchContent()
    {
        // Retrieve and display content purchased by the audience
        $audience = Audiens::find(auth()->id());
        $purchasedContent = $audience->transactions;

        return response()->json(['content' => $purchasedContent]);
    }
    


    // EDIT PROFILE
    public function editProfile(Request $request)
    {
        // Update audience profile based on the request data
        $audience = Audiens::find(auth()->id());
        $audience->update($request->only(['email', 'username', 'noHP', 'profilePict']));

        return response()->json(['message' => 'Profile updated successfully']);
    }
}
