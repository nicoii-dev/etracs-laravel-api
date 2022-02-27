<?php

namespace App\Http\Controllers;

use App\Models\AssessmentLevel;
use App\Models\MarketValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AssessmentLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function index()
    {
        return DB::table('assessment_levels')->get();
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
            'name' => 'required',
            'fix' => 'required',
            'rate' => 'required',
            'class' => 'required',
        ]);

        AssessmentLevel::create([
            'code' => $request['code'],
            'name' => $request['name'],
            'fix' => $request['fix'],
            'rate' => $request['rate'],
            'class' => $request['class'],
        ]);
        return DB::table('assessment_levels')->get();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function show($id)
    {
        return DB::table('assessment_levels')
        ->where('assessment_levels.id', $id)
        ->join('market_values', 'assessment_levels.id', '=', 'market_values.assessment_level_id')
        ->select('assessment_levels.id', 'code', 'name', 'rate', 'class', 'market_value_from',
                    'market_value_to', 'market_value_rate') // specify the values
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
            'code' => 'required',
            'name' => 'required',
            'fix' => 'required',
            'rate' => 'required',
            'class' => 'required',
        ]);

         $update = AssessmentLevel::where('id',$id)->update([
            'code' => $request['code'],
            'name' => $request['name'],
            'fix' => $request['fix'],
            'rate' => $request['rate'],
            'class' => $request['class'],
        ]);
         if($update){
             return DB::table('assessment_levels')->get();
         } else {
             return 422;
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function destroy($id)
    {
        if(DB::table("assessment_levels")->where('id',$id)->delete()){
            return DB::table('assessment_levels')->get();
        }else{
            return 500;
        }
    }
}
