<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark($id){
        $data = Bookmark::where('user_id', Auth::user()->id)
            ->where('job_id', $id)->get();
        if($data->all()){
            $data[0]->delete();
        }else{
            Bookmark::create(
                [
                    'user_id'=> Auth::user()->id,
                    'job_id' => $id
                ]
            );
        }

        return redirect()->back();
    }

    public function index(){
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();

        $jobs = $bookmarks->map(function($bookmark){
            return $bookmark->job;
        });

        return view('bookmark',[
            'jobs' => $jobs
        ]);
    }
}
