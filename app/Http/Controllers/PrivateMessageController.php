<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\PrivateMessage;

class PrivateMessageController extends Controller
{
    public function index($sender_id,$receiver_id)
    {
      $pengirim = User::find($sender_id);
      $penerima = User::find($receiver_id);
      if ($pengirim->id == Auth::user()->id) {
        $pesanpengirim = PrivateMessage::where('sender_id', $pengirim->id)->where('receiver_id', $penerima->id)->get();
        $pesanpenerima = PrivateMessage::where('sender_id', $penerima->id)->where('receiver_id', $pengirim->id)->get();
        $pesans = $pesanpengirim->merge($pesanpenerima);
        $pesans = $pesans->sortBy('created_at');
      } else {
        $pesanpengirim = PrivateMessage::where('sender_id', $penerima->id)->where('receiver_id', $pengirim->id)->get();
        $pesanpenerima = PrivateMessage::where('sender_id', $pengirim->id)->where('receiver_id', $penerima->id)->get();
        $pesans = $pesanpengirim->merge($pesanpenerima);
        $pesans = $pesans->sortBy('created_at');
      }
      return view('depan.content.privatemessage',compact('pengirim','penerima','pesans','pesanpenerima', 'pesanpengirim'));
    }

    public function store(Request $request,$sender_id,$receiver_id)
    {
      $pm = new PrivateMessage;
      $pm->sender_id = $request->sender_id;
      $pm->receiver_id = $request->receiver_id;
      $pm->isi = $request->isi;
      $pm->save();
      return back();
    }

    public function userCekPesan()
    {
      $user = User::find(Auth::user()->id);
      $pesans = PrivateMessage::where('receiver_id',$user->id)->groupBy('sender_id')->get();
      return view('depan.content.userpm', compact('pesans'));
    }
}
