<?php

namespace App\Http\Controllers;
use App\Models\Stripping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrippingController extends Controller
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
            'stripping_level' => 'required',
            'rate' => 'required',
        ]);
        Stripping::create([
            'classification_id' => $request['classification_id'],
            'stripping_level' => $request['stripping_level'],
            'rate' => $request['rate'],
        ]);
        return DB::table('strippings')
            ->where('strippings.classification_id', $request['classification_id'])
            ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Support\Collection
     */
    public function show($id)
    {
        return DB::table('strippings')
            ->where('strippings.classification_id', $id)
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
            'stripping_level' => 'required',
            'rate' => 'required',
        ]);
        $update = Stripping::where('id', $id)->update([
            'classification_id' => $request['classification_id'],
            'stripping_level' => $request['stripping_level'],
            'rate' => $request['rate'],
        ]);
        if($update){
            return DB::table('strippings')
                ->where('strippings.classification_id', $request['classification_id'])
                ->get();
        }else{
            return 500;
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

        if(DB::table("strippings")->where('id',$id)->delete()){
            return DB::table('strippings')
                ->where('strippings.classification_id', $request['classification_id'])
                ->get();
        }else{
            return 500;
        }
    }
}
