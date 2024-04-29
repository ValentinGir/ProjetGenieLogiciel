<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Exception;
use Symfony\Component\HttpFoundation\Response;

class CheckTuteurRole
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

            if ($user && ($user->role->libelle === 'tuteur' || $user->role->libelle === 'admin')) {
                return $next($request);
            }
    
            abort(403, 'Accès refusé');

        }catch (Exception $e){
            return \response()->json(['message'=>'acces refuse'],403);
        }
    }
}
