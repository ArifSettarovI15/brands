<?php

namespace App\Modules\Brands\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        elseif($request->user()->role_id !=3){
            return response()->json(['У вас нет прав доступа к текущей странице']);
        }
        return $next($request);
    }
}
