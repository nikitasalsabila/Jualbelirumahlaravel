<?php

namespace App\Http\Middleware;

use Closure;
use App\Komentaruser;
use Auth;

class CommentUser
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
      $alamat = url()->current();
      $idprofile = substr($alamat,-1);
      $komentar = Komentaruser::where('receive_id',$idprofile)->where('sender_id',Auth::user()->id)->count();
      if ($komentar < 1) {
        return $next($request);
      }
      return back();
    }
}
