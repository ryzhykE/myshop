<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$this->auth->check())
        {
            return redirect()->to('/login')
                ->with('status', 'success')
                ->with('message', 'Please login.');
        }


        if($role == 'all')
        {
            return $next($request);
        }
        if( $this->auth->guest() || !$this->auth->user()->hasRole($role))
        {
            abort(403);
        }
        return $next($request);
    }
}