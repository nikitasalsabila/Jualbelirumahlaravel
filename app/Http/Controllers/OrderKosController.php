<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kos;
use App\kamar;
use App\OrderKos;

class OrderKosController extends Controller
{
    public function tambahpemesanan($kos, $kamar)
    {
      $kos = Kos::find($kos);
      $kamar = Kamar::find($kamar);
      return view('depan.content.tambahorderkos', compact('kos','kamar'));
    }

    public function store($id, Request $request)
    {
      $order = new OrderKos;
      $order->user_id = $request->user_id;
      $order->kos_id = $request->kos_id;
      $order->kamar_id = $request->kamar_id;
      $order->nomorhp = $request->nomorhp;
      $order->save();
      return redirect()->route('rumahkos.index');
    }

    public function terima($id)
    {
      $order = OrderKos::find($id);
      $order->status = 1;
      $order->save();

      $kamar = Kamar::find($order->kamar_id);
      $kamar->user_id = $order->user_id;
      $kamar->status = 1;
      $kamar->save();

      return back();
    }

    public function tolak($id)
    {
      $order = OrderKos::find($id);
      $order->delete();
      return back();
    }

    public function hapuspemesan($id)
    {
      $kamar = Kamar::find($id);
      $kamar->status = 0;
      $kamar->save();
      return back();
    }
}
