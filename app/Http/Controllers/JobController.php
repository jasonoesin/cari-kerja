<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

        $request['company_id'] = auth()->user()->company->id;
        $request['skills'] = json_encode($request['skills']);

        Job::create($request->except("_token"));

        return redirect('/jobs');
    }

    public function index(){
        $jobs = Job::all();

        return view('job',[
            'jobs' => $jobs
        ]);
    }

    public function company_jobs($id){
        $company = Company::find($id);

        return view('job',[
            'jobs' => $company->jobs
        ]);
    }

    public function detail($id){
        return view('job-detail', [
            'job' =>  Job::find($id)
        ]);
    }
}
