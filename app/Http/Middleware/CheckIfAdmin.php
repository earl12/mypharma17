<?php namespace App\Http\Middleware;
use Closure;

class CheckIfAdmin
{
    public function handle($request, Closure $next)
    {   
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        } else {
            if ($this->auth->user()->hasRole('Administrator')) {
                return $next($request);
            } else {
                return redirect()->guest('home');
            }
        }
    }
}
