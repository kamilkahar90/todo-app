<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoLimitForFreeUser
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
        //relationship 1 user many todo
        //check if free user
        //count todo =>10 return response
        $countTodos = Todo::where('user_id', $request->user()->id)->count();

        if ($countTodos>=10 && $request->user()->type == 'free') {
            return response()->json([
                'message' => 'You have reach Todo limit. Go premium!',
            ]);
        }

        return $next($request);
    }
}
