<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Exception;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $user = auth()->user();

            if($user && $user->role->libelle!=='admin'){
               abort(403);
            }
            return $next($request);


        }catch (Exception $e){
            return \response()->json(['message'=>'acces refuse'],403);
        }
    }
}
