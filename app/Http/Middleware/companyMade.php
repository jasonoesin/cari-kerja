<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\Job;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class companyMade
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->type != "company"){
                return redirect()->back();
            }

            if(Auth::user()->company != null)
                return redirect()->back();

            return $next($request);
        }

        return redirect('/login');
    }
}
