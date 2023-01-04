<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::all();

        return view('company', [
            'companies'=> $companies
        ]);
    }

    public function detail($id){
        $company = Company::find($id);

        return view('company-detail', [
            'company'=> $company
        ]);
    }

    public function store(Request $request){

        $company = Company::create($request->except('_token'));

        return view('company-detail', [
            'company'=> $company
        ]);
    }
}
