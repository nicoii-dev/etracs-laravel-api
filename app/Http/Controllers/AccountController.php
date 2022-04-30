<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AccountController extends Controller
{
    public function index() {
        return DB::table('users')
            ->join('personnels', 'users.personnel_id', '=', 'personnels.id')
            ->select('users.id', 'personnel_id', 'users.email', 'allow_login', 'role',
                'email_verified_at', 'firstname', 'middlename', 'lastname')
            ->get();
//        return DB::table('users')
//            ->join('personnels', 'users.personnel_id', '=', 'personnels.id')
//            ->join('job_positions', 'users.id', '=', 'job_positions.user_id')
//            ->select('users.id', 'personnel_id', 'users.email', 'allow_login', 'role',
//                'email_verified_at', 'firstname', 'middlename', 'lastname', 'code', 'description', 'org')
//            ->get();
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
        return DB::table('users')
            ->join('personnels', 'users.personnel_id', '=', 'personnels.id')
            ->select('users.id', 'personnel_id', 'users.email', 'allow_login', 'role',
                'email_verified_at', 'firstname', 'middlename', 'lastname')
            ->get();
//        return DB::table('users')
//            ->join('personnels', 'users.personnel_id', '=', 'personnels.id')
//            ->join('job_positions', 'users.id', '=', 'job_positions.user_id')
//            ->select('users.id', 'personnel_id', 'users.email', 'allow_login', 'role',
//                'email_verified_at', 'firstname', 'middlename', 'lastname', 'code', 'description', 'org')
//            ->get();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'allow_login' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'allow_login' => $request['allow_login'],
            'role' => $request['role'],
        ]);
        return DB::table('users')
            ->join('personnels', 'users.personnel_id', '=', 'personnels.id')
            ->select('users.id', 'personnel_id', 'users.email', 'allow_login', 'role',
                'email_verified_at', 'firstname', 'middlename', 'lastname')
            ->get();
//        return DB::table('users')
//            ->join('personnels', 'users.personnel_id', '=', 'personnels.id')
//            ->join('job_positions', 'users.id', '=', 'job_positions.user_id')
//            ->select('users.id', 'personnel_id', 'users.email', 'allow_login', 'role',
//                'email_verified_at', 'firstname', 'middlename', 'lastname', 'code', 'description', 'org')
//            ->get();
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

      //  $test = User::with('getPersonnel')->get(); //eloquent

        $personnel = DB::table('personnels')
            ->where('personnels.id', $user["personnel_id"])
            ->get();
        $job = DB::table('job_positions')
            ->where('job_positions.user_id', $user["id"])
            ->get();

        if($user->allow_login == "yes" && $job->containsOneItem()) {
            $response = [
                'user' => $user,
                'token' => $token,
                'personnel' => $personnel,
                'job' => $job,
            ];
        } else if($job->isEmpty()) {
            $response = "Please ask for your job description";
        } else {
            $response = "not allowed";

        }

        return response($response);
    }

    public function logout(Request $request) {
        Auth::logout();

        return [
            'message' => 'Logged out'
        ];
    }
}
