<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobPosition;
use Illuminate\Support\Facades\DB;
class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JobPosition[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response|\Illuminate\Support\Collection
     */
    public function index()
    {
        return DB::table('job_positions')
            ->join('users', 'job_positions.user_id', '=', 'users.id')
            ->select('job_positions.id', 'job_positions.user_id', 'code', 'description',
                        'org', 'users.email', 'users.allow_login', 'users.role')
            ->get();
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
            'description' => 'required',
            'org' => 'required',
        ]);
        JobPosition::create([
            'code' => $request['code'],
            'description' => $request['description'],
            'org' => $request['org'],
            'user_id' => $request['user_id'],
        ]);
        return DB::table('job_positions')
            ->join('users', 'job_positions.user_id', '=', 'users.id')
            ->select('job_positions.id', 'job_positions.user_id', 'code', 'description',
                'org', 'users.email', 'users.allow_login', 'users.role')
            ->get();
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
            'code' => 'required',
            'description' => 'required',
            'org' => 'required',
        ]);
        $update = JobPosition::where('id',$id)->update([
            'code' => $request['code'],
            'description' => $request['description'],
            'org' => $request['org'],
            'user_id' => $request['user_id'],
        ]);
        if($update) {
            return DB::table('job_positions')
                ->join('users', 'job_positions.user_id', '=', 'users.id')
                ->select('job_positions.id', 'job_positions.user_id', 'code', 'description',
                    'org', 'users.email', 'users.allow_login', 'users.role')
                ->get();
        }
        return 422;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|int
     */
    public function destroy($id)
    {
        if(DB::table("job_positions")->where('id',$id)->delete()){
            return DB::table('job_positions')
                ->join('users', 'job_positions.user_id', '=', 'users.id')
                ->select('job_positions.id', 'job_positions.user_id', 'code', 'description',
                    'org', 'users.email', 'users.allow_login', 'users.role')
                ->get();
        }
        return 500;
    }
}
