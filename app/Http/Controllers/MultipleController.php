<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multiple;
use App\Models\MultipleAddress;
use Illuminate\Support\Facades\DB;

class MultipleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('multiples')
        ->join('multiple_addresses', 'multiples.id', '=', 'multiple_addresses.multiple_id')
        ->select('multiples.id', 'account_number', 'multiple_name', 'email', 'contact_number',
                    'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
            'multiple_name' => 'required',
            'contact_number' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city_municipality' => 'required',
            'zipcode' => 'required'
        ]);
        
        $multiple = Multiple::create([
            'account_number' => $request['account_number'],
            'multiple_name' => $request['multiple_name'],
            'email' => $request['email'],
            'contact_number' => $request['contact_number'],
            'remarks' => $request['remarks'],
        ]);

        MultipleAddress::create([
            'multiple_id' => $multiple->id,
            'house_number' => $request['house_number'],
            'street' => $request['street'],
            'barangay' => $request['barangay'],
            'city_municipality' => $request['city_municipality'],
            'zipcode' => $request['zipcode'],
        ]);

        return DB::table('multiples')
        ->join('multiple_addresses', 'multiples.id', '=', 'multiple_addresses.multiple_id')
        ->select('multiples.id', 'account_number', 'multiple_name', 'email', 'contact_number',
                    'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
        return Multiple::find($id);
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
            'multiple_name' => 'required',
            'contact_number' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city_municipality' => 'required',
            'zipcode' => 'required'
        ]);

        Multiple::where('id',$id)->update([
            'account_number' => $request['account_number'],
            'multiple_name' => $request['multiple_name'],
            'email' => $request['email'],
            'contact_number' => $request['contact_number'],
            'remarks' => $request['remarks'],
        ]);

        MultipleAddress::where('multiple_id',$id)->update([
            'house_number' => $request['house_number'],
            'street' => $request['street'],
            'barangay' => $request['barangay'],
            'city_municipality' => $request['city_municipality'],
            'zipcode' => $request['zipcode'],
        ]);

        return DB::table('multiples')
        ->join('multiple_addresses', 'multiples.id', '=', 'multiple_addresses.multiple_id')
        ->select('multiples.id', 'account_number', 'multiple_name', 'email', 'contact_number',
                    'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
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
        if(DB::table("multiples")->where('id',$id)->delete()){
            return DB::table('multiples')
            ->join('multiple_addresses', 'multiples.id', '=', 'multiple_addresses.multiple_id')
            ->select('multiples.id', 'account_number', 'multiple_name', 'email', 'contact_number',
                        'house_number', 'street', 'barangay', 'city_municipality', 'zipcode', 'remarks',) // specify the values
            ->get();
        }else{
            return 500;
        }
    }

    public function multipleDelete(Request $request)
    {
        $ids = $request->ids;
        if(DB::table("multiples")->whereIn('id',explode(",",$ids))->delete()){
            return DB::table('multiples')
            ->join('multiple_addresses', 'multiples.id', '=', 'multiple_addresses.multiple_id')
            ->select('multiples.id', 'account_number', 'multiple_name', 'email', 'contact_number',
                        'house_number', 'street', 'barangay', 'city_municipality', 'zipcode' , 'remarks',) // specify the values
            ->get();
        }else{
            return 500;
        }

    }
}
