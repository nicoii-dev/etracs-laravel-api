<?php

namespace App\Http\Controllers;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function index()
    {
        return DB::table('municipalities')->get();
//            ->join('barangays', 'municipalities.id', '=', 'barangays.municipality_id')
//            ->select('barangays.id', 'barangays.municipality_id', 'municipalities.municipality_name', 'municipalities.lgu_name',
//                            'barangays.lgu_name', 'barangays.formal_name', 'municipalities.index_number', 'municipalities.parent_id')
//            ->get();
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
            'municipality_name' => 'required',
            'lgu_name' => 'required',
            'index_number' => 'required',
            'parent_id' => 'required',
        ]);
        Municipality::create([
            'municipality_name' => $request['municipality_name'],
            'lgu_name' => $request['lgu_name'],
            'index_number' => $request['index_number'],
            'parent_id' => $request['parent_id'],
        ]);
        return DB::table('municipalities')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Municipality::find($id);
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
            'municipality_name' => 'required',
            'lgu_name' => 'required',
            'index_number' => 'required',
            'parent_id' => 'required',
        ]);

        $update = Municipality::where('id',$id)->update([
            'municipality_name' => $request['municipality_name'],
            'lgu_name' => $request['lgu_name'],
            'index_number' => $request['index_number'],
            'parent_id' => $request['parent_id'],
        ]);
        if($update){
            return DB::table('municipalities')->get();
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
        if(DB::table("municipalities")->where('id',$id)->delete()){
            return DB::table('municipalities')->get();
        }else{
            return 500;
        }
    }
}
