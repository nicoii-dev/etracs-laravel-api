<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Account;

class AccountController extends Controller
{
//    public function register(Request $request) {
//        $fields = $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|string|unique:users,email',
//            'password' => 'required|string|confirmed'
//        ]);
//
//        $user = User::create([
//            'name' => $fields['name'],
//            'email' => $fields['email'],
//            'password' => bcrypt($fields['password'])
//        ]);
//
//        $token = $user->createToken('myapptoken')->plainTextToken;
//
//        $response = [
//            'user' => $user,
//            'token' => $token
//        ];
//
//        return response($response, 201);
//    }

    public function createAccount(Request $request) {
        $fields = $request->validate([
            'personnel_id' => 'required',
            'username'  => 'required|string|unique:accounts,username',
            'password'  => 'required',
            'allow_login'  => 'required',
            'job_position_id'  => 'required',
        ]);

        $user = Account::create([
            'personnel_id' => $fields['personnel_id'],
            'username' => $fields['username'],
            'password' => bcrypt($fields['password']),
            'allow_login' => $fields['allow_login'],
            'job_position_id' => $fields['job_position_id'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function changePassword(Request $request) {
        $fields = $request->validate([
            'username' => 'required|string',
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        // Check email
        $user = Account::where('username', $fields['username'])->first();

        // Check password
        if(!$user || !Hash::check($fields['current_password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $user->password = Hash::make($fields['new_password']);
        $user->save();

        $response = [
            $user,
        ];
        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = Account::where('username', $fields['username'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
