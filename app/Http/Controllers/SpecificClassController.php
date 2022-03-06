<?php

namespace App\Http\Controllers;
use App\Models\SpecificClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecificClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'classification_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'area_type' => 'required',
        ]);
        SpecificClass::create([
            'classification_id' => $request['classification_id'],
            'code' => $request['code'],
            'name' => $request['name'],
            'area_type' => $request['area_type'],
        ]);
        return DB::table('specific_classes')
            ->where('specific_classes.classification_id', $request['classification_id'])
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
        return DB::table('specific_classes')
            ->where('specific_classes.classification_id', $id)
            ->get();
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
            'classification_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'area_type' => 'required',
        ]);
        $update = SpecificClass::where('id',$id)->update([
            'classification_id' => $request['classification_id'],
            'code' => $request['code'],
            'name' => $request['name'],
            'area_type' => $request['area_type'],
        ]);
        if($update){
            return DB::table('specific_classes')
                ->where('specific_classes.classification_id', $request['classification_id'])
                ->get();
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
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'classification_id' => 'required',
        ]);

        if(DB::table("specific_classes")->where('id',$id)->delete()){
            return DB::table('specific_classes')
                ->where('specific_classes.classification_id', $request['classification_id'])
                ->get();
        }else{
            return 500;
        }
    }
}
