<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\DB;
class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function index()
    {
        return DB::table('classifications')->get();
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
            'code' => 'required',
            'classification' => 'required',
            'rate' => 'required',
            'year_tag' => 'required'
        ]);

        Classification::create([
            'code' => $request['code'],
            'classification' => $request['classification'],
            'rate' => $request['rate'],
            'lgu_tag' => $request['lgu_tag'],
            'year_tag' => $request['year_tag'],
        ]);
        return DB::table('classifications')->get();
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
            'code' => 'required',
            'classification' => 'required',
            'year_tag' => 'required'
        ]);
        $update = Classification::where('id',$id)->update([
            'code' => $request['code'],
            'classification' => $request['classification'],
            'rate' => $request['rate'],
            'lgu_tag' => $request['lgu_tag'],
            'year_tag' => $request['year_tag'],
        ]);
        if($update){
            return DB::table('classifications')->get();
        } else {
            return 422;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function destroy($id)
    {
        if(DB::table("classifications")->where('id',$id)->delete()){
            return DB::table('classifications')->get();
        }else{
            return 500;
        }
    }
}
