<?php

namespace App\Http\Controllers;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Barangay::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function store(Request $request)
    {
        $request->validate([
            'municipality_id' => 'required',
            'index_number' => 'required',
            'lgu_name' => 'required',
            'formal_name' => 'required',
            'pin' => 'required'
        ]);

        Barangay::create([
            'municipality_id' => $request['municipality_id'],
            'index_number' => $request['index_number'],
            'lgu_name' => $request['lgu_name'],
            'formal_name' => $request['formal_name'],
            'pin' => $request['pin'],
        ]);
        return DB::table('barangays')
            ->where('barangays.municipality_id', $request['municipality_id'])
            ->get();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function show($id)
    {
        return DB::table('barangays')
            ->where('barangays.municipality_id', $id)
            ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'municipality_id' => 'required',
            'index_number' => 'required',
            'lgu_name' => 'required',
            'formal_name' => 'required',
            'pin' => 'required'
        ]);

        Barangay::where('id', $id)->update([
            'index_number' => $request['index_number'],
            'lgu_name' => $request['lgu_name'],
            'formal_name' => $request['formal_name'],
            'pin' => $request['pin'],
        ]);
        return DB::table('barangays')
            ->where('barangays.municipality_id', $request['municipality_id'])
            ->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'municipality_id' => 'required',
        ]);
        if(DB::table("barangays")->where('id',$id)->delete()){
            return DB::table('barangays')
                ->where('municipality_id', $request['municipality_id'])
                ->get();
        }else{
            return 500;
        }
    }
}
