<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juridical;
use App\Models\JuridicalAddress;
use Illuminate\Support\Facades\DB;

class JuridicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('juridicals')
        ->join('juridical_addresses', 'juridicals.id', '=', 'juridical_addresses.juridical_id')
        ->select('juridicals.id', 'account_number', 'juridical_name', 'email', 'contact_number', 'date_registered', 'kind_of_organization', 
                'tin', 'nature_of_business', 'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
            'account_number' => 'required',
            'juridical_name' => 'required',
            'contact_number' => 'required',
            'date_registered' => 'required',
            'kind_of_organization' => 'required',
            'tin' => 'required',
            'nature_of_business' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city_municipality' => 'required',
            'zipcode' => 'required'
        ]);
        
        $juridical = Juridical::create([
            'account_number' => $request['account_number'],
            'juridical_name' => $request['juridical_name'],
            'email' => $request['email'],
            'contact_number' => $request['contact_number'],
            'date_registered' => $request['date_registered'],
            'kind_of_organization' => $request['kind_of_organization'],
            'tin' => $request['tin'],
            'nature_of_business' => $request['nature_of_business'],
            'remarks' => $request['remarks'],
        ]);

        JuridicalAddress::create([
            'juridical_id' => $juridical->id,
            'house_number' => $request['house_number'],
            'street' => $request['street'],
            'barangay' => $request['barangay'],
            'city_municipality' => $request['city_municipality'],
            'zipcode' => $request['zipcode'],
        ]);

        return DB::table('juridicals')
        ->join('juridical_addresses', 'juridicals.id', '=', 'juridical_addresses.juridical_id')
        ->select('juridicals.id', 'account_number', 'juridical_name', 'email', 'contact_number', 'date_registered', 'kind_of_organization', 
                'tin', 'nature_of_business', 'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
        return DB::table('juridicals')
        ->where('juridicals.id', $id)
        ->join('juridical_addresses', 'juridicals.id', '=', 'juridical_addresses.juridical_id')
        ->select('juridicals.id', 'account_number', 'juridical_name', 'email', 'contact_number', 'date_registered', 'kind_of_organization', 
                'tin', 'nature_of_business', 'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
        $request->validate([
            'account_number' => 'required',
            'juridical_name' => 'required',
            'contact_number' => 'required',
            'date_registered' => 'required',
            'kind_of_organization' => 'required',
            'tin' => 'required',
            'nature_of_business' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city_municipality' => 'required',
            'zipcode' => 'required'
        ]);

        Juridical::where('id',$id)->update([
            'account_number' => $request['account_number'],
            'juridical_name' => $request['juridical_name'],
            'email' => $request['email'],
            'contact_number' => $request['contact_number'],
            'date_registered' => $request['date_registered'],
            'kind_of_organization' => $request['kind_of_organization'],
            'tin' => $request['tin'],
            'nature_of_business' => $request['nature_of_business'],
            'remarks' => $request['remarks'],
        ]);

        JuridicalAddress::where('juridical_id',$id)->update([
            'house_number' => $request['house_number'],
            'street' => $request['street'],
            'barangay' => $request['barangay'],
            'city_municipality' => $request['city_municipality'],
            'zipcode' => $request['zipcode'],
        ]);

        return DB::table('juridicals')
        ->join('juridical_addresses', 'juridicals.id', '=', 'juridical_addresses.juridical_id')
        ->select('juridicals.id', 'account_number', 'juridical_name', 'email', 'contact_number', 'date_registered', 'kind_of_organization', 
                'tin', 'nature_of_business', 'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
        if(DB::table("juridicals")->where('id',$id)->delete()){
            return DB::table('juridicals')
            ->join('juridical_addresses', 'juridicals.id', '=', 'juridical_addresses.juridical_id')
            ->select('juridicals.id', 'account_number', 'juridical_name', 'email', 'contact_number', 'date_registered', 'kind_of_organization', 
                    'tin', 'nature_of_business', 'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks') // specify the values
            ->get();
        }else{
            return 500;
        }
    }

    public function multipleDelete(Request $request)
    {
        $ids = $request->ids;
        if(DB::table("juridicals")->whereIn('id',explode(",",$ids))->delete()){
            return DB::table('juridicals')
            ->join('juridical_addresses', 'juridicals.id', '=', 'juridical_addresses.juridical_id')
            ->select('juridicals.id', 'account_number', 'juridical_name', 'email', 'contact_number', 'date_registered', 'kind_of_organization', 
                    'tin', 'nature_of_business', 'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
            ->get();
        }else{
            return 500;
        }

    }
}
