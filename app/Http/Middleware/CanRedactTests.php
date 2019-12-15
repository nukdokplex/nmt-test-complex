<?php


namespace App\Http\Middleware;


use Closure;

class CanRedactTests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user or $user->privileges < 2){
            return redirect("/");
        }

        return $next($request);
    }
}
