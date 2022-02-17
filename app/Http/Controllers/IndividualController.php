<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use App\Models\IndividualAddress;
use App\Models\OtherInformation;
use Illuminate\Support\Facades\DB;

class IndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $individualAddress = Individual::with('address')->get();
        // $otherInformation = Individual::with('other_info')->get();
        // return $individualAddress;
        return DB::table('individuals')
        ->join('individual_addresses', '.individuals.id', '=', 'individual_addresses.individual_id')
        ->join('other_information', 'individuals.id', '=', 'other_information.individual_id')
        ->select('individuals.*', 'individual_addresses.*', 'profession', 'id_presented', 'tin', 'sss', 'height', 'weight') // specify the values
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'phone_number' => 'required',
            'birth_date' => 'required',
            'place_of_birth' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',

            'street' => 'required',
            'barangay' => 'required',
            'city_municipality' => 'required',
        ]);

        $individual = Individual::create([
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'birth_date' => $request['birth_date'],
            'place_of_birth' => $request['place_of_birth'],
            'gender' => $request['gender'],
            'civil_status' => $request['civil_status'],
        ]);

        IndividualAddress::create([
            'individual_id' => $individual->id,
            'house_number' => $request['house_number'],
            'street' => $request['street'],
            'barangay' => $request['barangay'],
            'city_municipality' => $request['city_municipality'],
        ]);

        OtherInformation::create([
            'individual_id' => $individual->id,
            'profession' => $request['profession'],
            'id_presented' => $request['id_presented'],
            'tin' => $request['tin'],
            'sss' => $request['sss'],
            'height' => $request['height'],
            'weight' => $request['weight'],
        ]);
        
        return DB::table('individuals')
        ->where('individuals.id', $individual->id)
        ->join('individual_addresses', '.individuals.id', '=', 'individual_addresses.individual_id')
        ->join('other_information', 'individuals.id', '=', 'other_information.individual_id')
        ->select('individuals.*', 'individual_addresses.*', 'profession', 'id_presented', 'tin', 'sss', 'height', 'weight') // specify the values
        ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('individuals')
        ->where('individuals.id', $id)
        ->join('individual_addresses', '.individuals.id', '=', 'individual_addresses.individual_id')
        ->join('other_information', 'individuals.id', '=', 'other_information.individual_id')
        ->select('individuals.*', 'individual_addresses.*', 'profession', 'id_presented', 'tin', 'sss', 'height', 'weight') // specify the values
        ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $individual = Individual::find($id);
        
        $individual->update([
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'birth_date' => $request['birth_date'],
            'place_of_birth' => $request['place_of_birth'],
            'gender' => $request['gender'],
            'civil_status' => $request['civil_status'],
        ]);

        IndividualAddress::where('individual_id',$id)->update([
            'house_number' => $request['house_number'],
            'street' => $request['street'],
            'barangay' => $request['barangay'],
            'city_municipality' => $request['city_municipality'],
        ]);
        OtherInformation::where('individual_id',$id)->update([
            'profession' => $request['profession'],
            'id_presented' => $request['id_presented'],
            'tin' => $request['tin'],
            'sss' => $request['sss'],
            'height' => $request['height'],
            'weight' => $request['weight'],
        ]);

        return DB::table('individuals')
        ->where('individuals.id', $id)
        ->join('individual_addresses', '.individuals.id', '=', 'individual_addresses.individual_id')
        ->join('other_information', 'individuals.id', '=', 'other_information.individual_id')
        ->select('individuals.*', 'individual_addresses.*', 'profession', 'id_presented', 'tin', 'sss', 'height', 'weight') // specify the values
        ->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Individual::destroy($id);
    }
}
