<?php

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use Closure;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try {
            $token = $request->header('Authorization');
            //print_r($token);die;
            $decoded = JWT::decode($token, config('jwt.key'), array('HS256'));
            
            if (!empty($decoded->data) && !empty($decoded->data->id))
                return $next($request);
        } catch (\Exception $e) {  
        } 

        return response()->json('Token invalido', 401);
         
    }
}
