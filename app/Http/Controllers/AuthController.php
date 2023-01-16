<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function profile(){
        return view('profile');
    }

    public function register_view(){
        return view('register');
    }

    public function login_view(){
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required",
            "location"=>"required",
            "password"=>"required",
            "confirm_password"=>"required",
            "type"=>"required",
        ]);

        if($request->confirm_password != $request->password){
            return redirect('/register')->withErrors([
                "Password doesn't match !"
            ]);
        }

        try {
            $creds = $request->except(["first_name","last_name","_token", "confirm_password"]);

            $creds["name"] = $request->first_name . " ". $request->last_name;
            $creds["password"] = bcrypt($request->password);

            User::create(
                $creds
            );

            return redirect('login');
        }
        catch (Exception $e) {
            return redirect('/register')->withErrors([
                "An error has occurred please try again !"
            ]);
        }

    }

    public function login(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);

        if(Auth::attempt($request->except("_token"))){
            return redirect('/');
        }else{
            return redirect('/login')->withErrors([
                "Login credentials doesn't match"
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function add_skill(Request $request){
        $user = User::find(\auth()->user()->id);
        $user->skills = json_encode($request['skills']);
        $user->save();

        return redirect()->back();
    }

    public function add_description(Request $request){
        $user = User::find(\auth()->user()->id);
        $user->description = $request->description;
        $user->save();

        return redirect()->back();
    }

    public function add_experience(Request $request){
        $request->validate([
            'title'=>"required",
            'type'=>"required",
            'company_name'=>"required",
            'description'=>"required",
        ]);

        $input = $request->except('_token');
        $input['user_id'] = auth()->user()->id;

        $data = Experience::create($input);

        return redirect()->back();
    }

    public function add_education(Request $request){
        $request->validate([
            'school'=>"required",
            'degree'=>"required",
            'field_of_study'=>"required",

        ]);

        $input = $request->except('_token');
        $input['user_id'] = auth()->user()->id;

        $data = Education::create($input);

        return redirect()->back();
    }

    public function delete_experience(Request $request, $id){
        Experience::find($id)->delete();
        return redirect()->back();
    }

    public function delete_education(Request $request, $id){
        Education::find($id)->delete();
        return redirect()->back();
    }
}
