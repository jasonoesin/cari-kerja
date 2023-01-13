<?php

namespace App\Http\Controllers;

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
}
