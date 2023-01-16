<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ApplyController extends Controller
{
    //
    public function index(){

        $applies = auth()->user()->applies;

        return view('applications', [
            'applies' => $applies
        ]);
    }

    public function company_applications($id){
        $jobs = Company::find($id)->jobs;

        $array = [];

        foreach ($jobs->all() as $job){
            $data = [
              'job'=> $job,
              'applies'=> $job->applies->all()
            ];
            array_push($array, $data);
        }

        return view('company-applications', [
            'array' => $array
        ]);
    }

    public function update_apply(Request $request, $id){
        $apply = Apply::find($id);

        $apply->phase++;
        $apply->save();

        return back();
    }

    public function decline_apply(Request $request, $id){
        $apply = Apply::find($id);

        $apply->phase++;
        $apply->accepted = false;
        $apply->save();

        return back();
    }

    public function accept_apply(Request $request, $id){
        $apply = Apply::find($id);

        $apply->phase++;
        $apply->accepted = true;
        $apply->save();

        return back();
    }
}
