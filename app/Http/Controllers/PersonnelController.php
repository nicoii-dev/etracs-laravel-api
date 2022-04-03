<?php

namespace App\Http\Controllers;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Personnel[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Personnel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function store(Request $request)
    {
        $request->validate([
            'staff_number' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
        ]);
        Personnel::create([
            'staff_number' => $request['staff_number'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'gender' => $request['gender'],
            'birth_date' => $request['birth_date'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'txn_code' => $request['txn_code'],
        ]);
        return DB::table('personnels')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'staff_number' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
        ]);
        $update = Personnel::where('id',$id)->update([
            'staff_number' => $request['staff_number'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'gender' => $request['gender'],
            'birth_date' => $request['birth_date'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'txn_code' => $request['txn_code'],
        ]);
        if($update) {
            return DB::table('personnels')->get();
        }
        return 422;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function destroy($id)
    {
        if(DB::table("personnels")->where('id',$id)->delete()){
            return DB::table('personnels')->get();
        }
        return 500;

    }
}
