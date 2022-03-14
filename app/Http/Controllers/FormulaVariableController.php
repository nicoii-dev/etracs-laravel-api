<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulaVariable;
use Illuminate\Support\Facades\DB;
class FormulaVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FormulaVariable::all();
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
            'variable' => 'required',
        ]);

        FormulaVariable::create([
            'variable' => $request['variable'],
        ]);
        return DB::table('formula_variables')->get();
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
            'variable' => 'required',
        ]);

        $update = FormulaVariable::where('id', $id)->update([
            'variable' => $request['variable'],
        ]);
        if($update){
            return DB::table('formula_variables')->get();
        } else {
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
        if(DB::table("formula_variables")->where('id',$id)->delete()){
            return DB::table('formula_variables')->get();
        }else{
            return 500;
        }
    }
}
