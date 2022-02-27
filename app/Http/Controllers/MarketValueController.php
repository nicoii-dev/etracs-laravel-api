<?php

namespace App\Http\Controllers;
use App\Models\MarketValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarketValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'assessment_level_id' => 'required',
            'market_value_from' => 'required',
            'market_value_to' => 'required',
            'market_value_rate' => 'required'
        ]);

        MarketValue::create([
            'assessment_level_id' => $request['assessment_level_id'],
            'market_value_from' => $request['market_value_from'],
            'market_value_to' => $request['market_value_to'],
            'market_value_rate' => $request['market_value_rate'],
        ]);
        return DB::table('market_values')
            ->where('market_values.assessment_level_id', $request['assessment_level_id'])
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
        return DB::table('market_values')
            ->where('market_values.assessment_level_id', $id)
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
            'assessment_level_id' => 'required',
            'market_value_from' => 'required',
            'market_value_to' => 'required',
            'market_value_rate' => 'required'
        ]);

        MarketValue::where('id', $id)->update([
            'market_value_from' => $request['market_value_from'],
            'market_value_to' => $request['market_value_to'],
            'market_value_rate' => $request['market_value_rate'],
        ]);
        return DB::table('market_values')
            ->where('market_values.assessment_level_id', $request['assessment_level_id'])
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
            'assessment_level_id' => 'required',
        ]);

        if(DB::table("market_values")->where('id',$id)->delete()){
            return DB::table('market_values')
                ->where('market_values.assessment_level_id', $request['assessment_level_id'])
                ->get();
        }else{
            return 500;
        }
    }
}
