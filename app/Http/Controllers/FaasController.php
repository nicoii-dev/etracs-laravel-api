<?php

namespace App\Http\Controllers;
use App\Models\Faas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FaasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function index()
    {
        return DB::table('faas')->get();
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
            'status' => 'required',
            'transaction' => 'required',
            'revision_year' => 'required',
            'td_number' => 'required',
            'title_type' => 'required',
            'issue_date' => 'required',
            'effectivity' => 'required',
            'quarter' => 'required',
            'restriction' => 'required',
            'owner_id' => 'required',
            'owner_name' => 'required',
            'owner_address' => 'required',
            'declared_owner' => 'required',
            'declared_address' => 'required',
            'pin' => 'required',
            'cadastral' => 'required',
            'north' => 'required',
            'east' => 'required',
            'south' => 'required',
            'west' => 'required',
            'classification_id' => 'required',
            'classification_name' => 'required',
            'specific_class' => 'required',
            'sub_class' => 'required',
            'unit_value' => 'required',
            'area' => 'required',
            'area_type' => 'required',
            'market_value' => 'required',
            'assessment_level' => 'required',
            'assessed_value' => 'required',
            'taxable' => 'required',
            'appraised_by' => 'required',
            'appraised_date' => 'required',
            'approve_by' => 'required',
            'approve_date' => 'required',
            'remarks' => 'required',
        ]);
        Faas::create([
            'status' => $request['status'],
            'transaction' => $request['transaction'],
            'revision_year' => $request['revision_year'],
            'td_number' => $request['td_number'],
            'title_type' => $request['title_type'],
            'title_number' => $request['title_number'],
            'title_date' => $request['title_date'],
            'issue_date' => $request['issue_date'],
            'effectivity' => $request['effectivity'],
            'quarter' => $request['quarter'],
            'restriction' => $request['restriction'],
            'previous_td_number' => $request['previous_td_number'],
            'previous_pin' => $request['previous_pin'],
            'owner_id' => $request['owner_id'],
            'owner_name' => $request['owner_name'],
            'owner_address' => $request['owner_address'],
            'declared_owner' => $request['declared_owner'],
            'declared_address' => $request['declared_address'],
            'pin' => $request['pin'],
            'beneficial_user' => $request['beneficial_user'],
            'beneficial_tin' => $request['beneficial_tin'],
            'beneficial_address' => $request['beneficial_address'],
            'location_house_number' => $request['location_house_number'],
            'location_street' => $request['location_street'],
            'cadastral' => $request['cadastral'],
            'block_number' => $request['block_number'],
            'survey_number' => $request['survey_number'],
            'purok_zone' => $request['purok_zone'],
            'north' => $request['north'],
            'east' => $request['east'],
            'south' => $request['south'],
            'west' => $request['west'],
            'classification_id' => $request['classification_id'],
            'classification_name' => $request['classification_name'],
            'specific_class' => $request['specific_class'],
            'sub_class' => $request['sub_class'],
            'unit_value' => $request['unit_value'],
            'area' => $request['area'],
            'area_type' => $request['area_type'],
            'market_value' => $request['market_value'],
            'actual_use' => $request['actual_use'],
            'assessment_level' => $request['assessment_level'],
            'assessed_value' => $request['assessed_value'],
            'taxable' => $request['taxable'],
            'previous_mv' => $request['previous_mv'],
            'previous_av' => $request['previous_av'],
            'appraised_by' => $request['appraised_by'],
            'appraised_date' => $request['appraised_date'],
            'recommended_by' => $request['recommended_by'],
            'recommended_date' => $request['recommended_date'],
            'approve_by' => $request['approve_by'],
            'approve_date' => $request['approve_date'],
            'remarks' => $request['remarks'],
        ]);
        return DB::table('faas')->get();
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
            'status' => 'required',
            'transaction' => 'required',
            'revision_year' => 'required',
            'td_number' => 'required',
            'title_type' => 'required',
            'issue_date' => 'required',
            'effectivity' => 'required',
            'quarter' => 'required',
            'restriction' => 'required',
            'owner_id' => 'required',
            'owner_name' => 'required',
            'owner_address' => 'required',
            'declared_owner' => 'required',
            'declared_address' => 'required',
            'pin' => 'required',
            'cadastral' => 'required',
            'north' => 'required',
            'east' => 'required',
            'south' => 'required',
            'west' => 'required',
            'classification_id' => 'required',
            'classification_name' => 'required',
            'specific_class' => 'required',
            'sub_class' => 'required',
            'unit_value' => 'required',
            'area' => 'required',
            'area_type' => 'required',
            'market_value' => 'required',
            'assessment_level' => 'required',
            'assessed_value' => 'required',
            'taxable' => 'required',
            'appraised_by' => 'required',
            'appraised_date' => 'required',
            'approve_by' => 'required',
            'approve_date' => 'required',
            'remarks' => 'required',
        ]);
        $update = Faas::where('id',$id)->update([
            'status' => $request['status'],
            'transaction' => $request['transaction'],
            'revision_year' => $request['revision_year'],
            'td_number' => $request['td_number'],
            'title_type' => $request['title_type'],
            'title_number' => $request['title_number'],
            'title_date' => $request['title_date'],
            'issue_date' => $request['issue_date'],
            'effectivity' => $request['effectivity'],
            'quarter' => $request['quarter'],
            'restriction' => $request['restriction'],
            'previous_td_number' => $request['previous_td_number'],
            'previous_pin' => $request['previous_pin'],
            'owner_id' => $request['owner_id'],
            'owner_name' => $request['owner_name'],
            'owner_address' => $request['owner_address'],
            'declared_owner' => $request['declared_owner'],
            'declared_address' => $request['declared_address'],
            'pin' => $request['pin'],
            'beneficial_user' => $request['beneficial_user'],
            'beneficial_tin' => $request['beneficial_tin'],
            'beneficial_address' => $request['beneficial_address'],
            'location_house_number' => $request['location_house_number'],
            'location_street' => $request['location_street'],
            'cadastral' => $request['cadastral'],
            'block_number' => $request['block_number'],
            'survey_number' => $request['survey_number'],
            'purok_zone' => $request['purok_zone'],
            'north' => $request['north'],
            'east' => $request['east'],
            'south' => $request['south'],
            'west' => $request['west'],
            'classification_id' => $request['classification_id'],
            'classification_name' => $request['classification_name'],
            'specific_class' => $request['specific_class'],
            'sub_class' => $request['sub_class'],
            'unit_value' => $request['unit_value'],
            'area' => $request['area'],
            'area_type' => $request['area_type'],
            'market_value' => $request['market_value'],
            'actual_use' => $request['actual_use'],
            'assessment_level' => $request['assessment_level'],
            'assessed_value' => $request['assessed_value'],
            'taxable' => $request['taxable'],
            'previous_mv' => $request['previous_mv'],
            'previous_av' => $request['previous_av'],
            'appraised_by' => $request['appraised_by'],
            'appraised_date' => $request['appraised_date'],
            'recommended_by' => $request['recommended_by'],
            'recommended_date' => $request['recommended_date'],
            'approve_by' => $request['approve_by'],
            'approve_date' => $request['approve_date'],
            'remarks' => $request['remarks'],
        ]);
        if($update){
            return DB::table('faas')->get();
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
        if(DB::table("faas")->where('id',$id)->delete()){
            return DB::table('faas')->get();
        }else{
            return 500;
        }
    }

    public function multipleDelete(Request $request)
    {
        $ids = $request->ids;
        if(DB::table("faas")->whereIn('id',explode(",",$ids))->delete()){
            return DB::table('faas')->get();
        }else{
            return 500;
        }

    }
}
