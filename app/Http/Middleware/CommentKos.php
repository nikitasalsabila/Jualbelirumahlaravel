<?php

namespace App\Http\Middleware;

use Closure;
use App\KomentarKos;
use Auth;

class CommentKos
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
      $komentar = KomentarKos::where('user_id',Auth::user()->id)->count();
      if ($komentar < 1) {
        return $next($request);
      }
      return back();
    }
}
