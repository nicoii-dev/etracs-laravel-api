<?php

namespace App\Http\Controllers;
use App\Models\LandAdjustment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandAdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LandAdjustment[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function index()
    {
        $data = DB::table("land_adjustments")->get();
        for($i=0; $i < count($data); $i++){
            $applied_to = DB::table("classifications")->whereIn('id',explode(",",$data[$i]->classification_id))->get();
            $data[$i]->classification_id = $applied_to;
        }
        return $data;
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
            'expression' => 'required',
        ]);

        LandAdjustment::create([
            'code' => $request['code'],
            'name' => $request['name'],
            'classification_id' => $request['classification_id'],
            'expression' => $request['expression'],
        ]);

        $data = DB::table("land_adjustments")->get();
        for($i=0; $i < count($data); $i++){
            $applied_to = DB::table("classifications")->whereIn('id',explode(",",$data[$i]->classification_id))->get();
            $data[$i]->classification_id = $applied_to;
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function show($id)
    {
        // getting all applied_to data
        $data = DB::table("land_adjustments")->where('id', $id)->get();
        $ids = $data[0]->classification_id; //getting all classification_id from selected LandAdjustment
        $applied_to = DB::table("classifications")->whereIn('id',explode(",",$ids))->get();
        $data[0]->applied_to = $applied_to; //adding classification data as array into object

        return $data;
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
            'code',
            'name',
            'expression',
        ]);

        $update = LandAdjustment::where('id', $id)->update([
            'code' => $request['code'],
            'name' => $request['name'],
            'classification_id' => $request['classification_id'],
            'expression' => $request['expression'],
        ]);
        if($update){
            $data = DB::table("land_adjustments")->get();
            for($i=0; $i < count($data); $i++){
                $applied_to = DB::table("classifications")->whereIn('id',explode(",",$data[$i]->classification_id))->get();
                $data[$i]->classification_id = $applied_to;
            }
            return $data;
        }else {
            return 500;
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
        if(DB::table("land_adjustments")->where('id',$id)->delete()){
            $data = DB::table("land_adjustments")->get();
            for($i=0; $i < count($data); $i++){
                $applied_to = DB::table("classifications")->whereIn('id',explode(",",$data[$i]->classification_id))->get();
                $data[$i]->classification_id = $applied_to;
            }
            return $data;
        }else{
            return 500;
        }
    }
}
