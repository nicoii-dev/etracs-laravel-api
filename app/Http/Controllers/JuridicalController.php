<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juridical;

class JuridicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Juridical::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'juridical_name' => 'required',
            'contact_number' => 'required',
            'date_registered' => 'required',
            'kind_of_organization' => 'required',
            'tin' => 'required',
            'nature_of_business' => 'required',
            'remarks' => 'required',
        ]);
        return Juridical::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Juridical::find($id);
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
        $juridical = Juridical::find($id);
        $juridical->update($request->all());
        return $juridical;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Juridical::destroy($id);
    }
}
