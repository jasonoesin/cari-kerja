<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Company;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
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
        $jobs = Job::paginate(9);

        return view('job',[
            'jobs' => $jobs
        ]);
    }

    public function search(Request $request){
        $query = $request->value;

        $jobs = Job::where("title","like","%$query%")->paginate(9);

        return view('job',[
            'jobs' => $jobs
        ]);
    }

    public function company_jobs($id){
        $jobs = Company::find($id)->jobs()->paginate(9);

        return view('job',[
            'jobs' =>$jobs
        ]);
    }

    public function detail($id){
        return view('job-detail', [
            'job' =>  Job::find($id)
        ]);
    }

    public function apply(Request $request, $id){
        $apply = Apply::create([
            'job_id' => $id,
            'user_id'=> auth()->user()->id,
            'apply_date' => Carbon::now(),
            'resume'=> ''
        ]);

        Storage::disk("public")->putFileAs('/apply/' . auth()->user()->id , $request->file('resume'), $id . "_resume.pdf");

        $apply->resume = "/apply/" . auth()->user()->id . "/". $id . "_resume.pdf";
        $apply->save();

        return redirect()->back();
    }
}
