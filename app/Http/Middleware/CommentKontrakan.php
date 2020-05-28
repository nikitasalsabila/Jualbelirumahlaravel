<?php

namespace App\Http\Middleware;

use Closure;
use App\KomentarKontrakan;
use Auth;

class CommentKontrakan
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
      $alamat = url()->previous();
      $idkontrakan = substr($alamat,-1);
      $komentar = KomentarKontrakan::where('kontrakan_id',$idkontrakan)->where('user_id',Auth::user()->id)->count();
      if ($komentar < 1) {
        return $next($request);
      }
      return back();
    }
}
