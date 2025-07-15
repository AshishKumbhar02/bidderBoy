<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuthenticate
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
        $auth = Auth::guard('admins')->check();
        if($auth) {
            
            //current user
            //$user = Auth::guard('admins')->user();
            //view()->share('USER', $user);

            //admin settings
            //$setting = DB::table('settings')->first();
            //view()->share('SETTING', $setting);

            return $next($request);

        }else {

            return redirect(route('admin.login'));

        }      
    }
}
