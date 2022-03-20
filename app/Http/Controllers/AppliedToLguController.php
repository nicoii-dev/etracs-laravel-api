<?php

namespace App\Http\Controllers;
use App\Models\AppliedToLgu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AppliedToLguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AppliedToLgu[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return AppliedToLgu::all();
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
            'lgu' => 'required',
            'year_tag' => 'required'
        ]);

        AppliedToLgu::create([
            'lgu' => $request['lgu'],
            'year_tag' => $request['year_tag'],
        ]);
        return DB::table('applied_to_lgus')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function show($id)
    {
        return DB::table('applied_to_lgus')
            ->where('applied_to_lgus.year_tag', $id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function destroy($id)
    {
        if(DB::table("applied_to_lgus")->where('id',$id)->delete()){
            return DB::table('applied_to_lgus')->get();
        }else{
            return 500;
        }
    }
}
