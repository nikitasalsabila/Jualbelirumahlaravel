<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontrakan;
use App\Kos;
use App\User;
use Auth;
use App\OrderKos;
use App\OrderKontrakan;

class DepanController extends Controller
{
    public function index()
    {
      $jlhuser = User::count();
      $jlhkontrakan = Kontrakan::count();
      $jlhkos = Kos::count();
      $orderkos = OrderKos::where('status',1)->count();
      $orderkontrakan = OrderKontrakan::where('status',1)->count();
      $jlhorder = $orderkos+$orderkontrakan;
      $kontrakanbaru = Kontrakan::latest()->paginate(6);
      $kosbaru = Kos::latest()->paginate(6);
      return view('depan.content.halamandepan', compact('kontrakanbaru','jlhuser','jlhkontrakan','kosbaru','jlhkos','jlhorder'));
    }

    public function kontak()
    {
      $kontrakans = Kontrakan::latest()->paginate(3);
      $koses = Kos::latest()->paginate(3);
      return view('depan.content.kontak', compact('kontrakans','koses'));
    }

    public function kontrakansaya()
    {
      $user = User::find(Auth::user()->id);
      $kontrakans = Kontrakan::latest()->where('status', 1)->where('user_id',$user->id)->paginate(6);
      $jumlahkontrakan = Kontrakan::where('status', 1)->where('user_id',$user->id)->get()->count();
      return view('depan.content.kontrakan', compact('kontrakans', 'jumlahkontrakan'));
    }

    public function kossaya()
    {
      $user = User::find(Auth::user()->id);
      $koses = Kos::latest()->where('status', 1)->where('user_id', $user->id)->paginate(6);
      $jumlahkos = Kos::where('status',1)->where('user_id', $user->id)->get()->count();
      return view('depan.content.kos', compact('koses', 'jumlahkos'));
    }
}
