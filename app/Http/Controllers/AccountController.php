<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AccountController extends Controller
{
    public function index() {
        return User::all();
    }

    public function createAccount(Request $request) {
        $fields = $request->validate([
            'personnel_id' => 'required',
            'email' => 'required|string|unique:users,email',
            'password'  => 'required',
            'allow_login'  => 'required',
            'role'  => 'required',
        ]);

        $user = User::create([
            'personnel_id' => $fields['personnel_id'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'allow_login' => $fields['allow_login'],
            'role' => $fields['role'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

//        $response = [
//            'user' => $user,
//            'token' => $token
//        ];

        return User::all();
    }

    public function changePassword(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

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
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

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
        Auth::logout();

        return [
            'message' => 'Logged out'
        ];
    }

    public function resetPassword(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
