<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    // REGISTER
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        //set user ke role 1 (audiens)
        $validatedData['role_id'] = 1;


        //create data + pesan 200 jika berhasil dan pesan 401 jika gagal
        try {
            $user = User::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil membuat user',
                'user' => $user 
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat user: ' . $e->getMessage()
            ], 401);
        }

    }


    // LOGIN 
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        //cek email dan password
        if(!auth()->attempt($loginData)){
            //kasi role 1
            //$user->role=1;
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah'
            ], 401);
        }

        //buat token
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        //pesan 200 jika berhasil dan pesan 401 jika gagal
        return response()->json([
            'success' => true,
            'message' => 'Berhasil login',
            'user' => auth()->user(),
            'access_token' => $accessToken
        ], 200);
    }


    // LOGOUT
    public function logout(Request $request){
        //ambil token
        $token = $request->user()->token();
        //hapus token
        $token->revoke();
        //pesan 200 jika berhasil dan pesan 401 jika gagal
        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout'
        ], 200);
    }


    // CHANGE ROLE (1 = Audiens, 2 = Kreator)
    public function changeRole(Request $request){
        //ambil user
        $user = $request->user();
        //cek role
        if($user->role== 1){
            //kasi role 2
            $user->role= 2;
            $user->save();
            //pesan 200 jika berhasil dan pesan 401 jika gagal
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menjadi Kreator'
            ], 200);
        } else {
            //kasi role 1
            $user->role= 1;
            $user->save();
            //pesan 200 jika berhasil dan pesan 401 jika gagal
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menjadi Audiens'
            ], 200);
        }
    }

    
    // DELETE USER
    public function deleteUser(Request $request){
        //ambil user
        $user = $request->user();
        //hapus user
        $user->delete();
        //pesan 200 jika berhasil dan pesan 401 jika gagal
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus user'
        ], 200);
    }


}
