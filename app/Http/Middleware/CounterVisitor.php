<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounterVisitor
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
        if (DB::table('m_visitor')->where('date', today())->where('ip', $ip)->count() < 1)
        {
            DB::table('m_visitor')->insert([
                'date' => today(),
                'ip' => $ip,
            ]);
        }
        return $next($request);
    }
}