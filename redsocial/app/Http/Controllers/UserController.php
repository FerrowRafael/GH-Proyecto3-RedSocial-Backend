<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1 REGISTER
    public function register(Request $request)
    {
        $body = $request->all();
        $body['password'] = Hash::make($body['password']);
        $user = User::create($body);
        return response($user, 201);
    }

    // 2 LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Wrong Credentials'
            ], 400); //res.status(400).send({'message' : 'Wrong Credentials'})
        }
        $user = $request->user(); //req.user tb podemos utilizar $request->user()
        $token = $user->createToken('authToken')->accessToken;
        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    // 3 LOGOUT
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        // DB::table('oauth_access_tokens')->where('revoked',1)->delete();
        return response([
            'mensaje' => 'User successfully logged out'
        ]);
    }

    // 4 GET USERS ALL
    public function getUsersAll()
    { //with es como include o populate()
         $user = User::all();
         return $user;
    }

    // 5 GET USERS BY ID
    public function getUserById(Request $request,$id)
    {
        $user = User::find($id);
        return $user;
    }
}