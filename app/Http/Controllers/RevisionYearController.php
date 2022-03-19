<?php

namespace App\Http\Controllers;
use App\Models\RevisionYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevisionYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RevisionYear[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return RevisionYear::all();
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
            'revision_year' => 'required',
        ]);

        RevisionYear::create([
            'revision_year' => $request['revision_year'],
        ]);
        return DB::table('revision_years')->get();
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
            'revision_year' => 'required',
        ]);

        $update = RevisionYear::where('id',$id)->update([
            'revision_year' => $request['revision_year'],
        ]);
        if($update){
            return DB::table('revision_years')->get();
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
        if(DB::table("revision_years")->where('id',$id)->delete()){
            return DB::table('revision_years')->get();
        }else{
            return 500;
        }
    }
}
