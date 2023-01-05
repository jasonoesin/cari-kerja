<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            "title"=>"required",
            "type"=>"required",
            "start_salary"=>"required",
            "end_salary"=>"required",
            "experience"=>"required",
            "skills"=>"required",
            "description"=>"required",
        ]);

        $request['skills'] = json_encode($request['skills']);

        Job::create($request->except("_token"));

        return redirect('/jobs');
    }
}
