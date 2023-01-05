<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            "name"=>"required",
            "logo"=>"required",
            "website"=>"required",
            "size"=>"required",
            "industry"=>"required",
            "description"=>"required",
            "address"=>"required"
        ]);

        $company = Company::create($request->except('_token', "logo"));

        $infoPath = pathinfo(public_path('/uploads/my_image.jpg'));

        $extension = $infoPath['extension'];

        Storage::disk("public")->putFileAs('/company/' . $company->id , $request->file('logo'), "logo.".$extension);

        $company->user_id = Auth::user()->id;
        $company->image = "/company/" . $company->id . "/logo.". $extension;
        $company->save();

        return redirect('company/' . $company->id);
    }
}
