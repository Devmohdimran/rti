<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class AdminAuth
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
        if(!Session::has('adminId') && Session::get('type') == 'admin'){
            return redirect()->route('loginPanel')->with('error','Please Login first');
        }

        if(!Session::has('branchId') && Session::get('type') == 'branch'){
            return redirect()->route('loginPanel')->with('error','Please Login first');
        }

        if(!Session::has('adminId') && !Session::has('branchId')){
            return redirect()->route('loginPanel')->with('error','Please Login first');
        }

        return $next($request);
    }
}
