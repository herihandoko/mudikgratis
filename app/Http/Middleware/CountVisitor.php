<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class CountVisitor
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
        $ip = hash('sha512', $request->ip());
        // if (Visitor::where('date_visit', today())->where('ip_address', $ip)->count() < 1) {
        Visitor::create([
            'date_visit' => today(),
            'ip_address' => $ip,
            'agent' => $_SERVER['HTTP_USER_AGENT']
        ]);
        // }
        return $next($request);
    }
}
