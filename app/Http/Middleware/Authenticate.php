<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
     // Override handle method
     public function handle($request, Closure $next, ...$guards)
     {
         if ($this->authenticate($request, $guards) === 'authentication_failed') {
            $this->refresh();
            $this->logout();
             return response()->json(['error'=>'Unauthorized'],400);
         }
         return $next($request);
     }
     // Override authentication method
     protected function authenticate($request, array $guards)
     {
         if (empty($guards)) {
             $guards = [null];
         }
         foreach ($guards as $guard) {
             if ($this->auth->guard($guard)->check()) {
                 return $this->auth->shouldUse($guard);
             }
         }
         $this->refresh();
         $this->logout();
         return 'authentication_failed';
     }

     public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            // return response()
            //     ->json(['status' => 'successs'], 200)
            //     ->header('Authorization', $token);

            return response()->json([
                "success" => true,
                "payload" => [
                    'access_token' => auth()->refresh(),
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60,
                    'user' => auth()->user()
                ]
            ]);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

     public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

     private function guard()
    {
        return Auth::guard();
    }
}
