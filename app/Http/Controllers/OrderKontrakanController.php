<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontrakan;
use App\OrderKontrakan;

class OrderKontrakanController extends Controller
{
    public function tambahpemesanan($id)
    {
      $kontrakan = Kontrakan::find($id);
      return view('depan.content.tambahorderkontrakan', compact('kontrakan'));
    }

    public function store($id, Request $request)
    {
      $order = new OrderKontrakan;
      $order->user_id = $request->user_id;
      $order->kontrakan_id = $request->kontrakan_id;
      $order->nomorhp = $request->nomorhp;
      $order->save();
      return redirect()->route('kontrakan.index');
    }

    public function terima($id)
    {
      $order = OrderKontrakan::find($id);
      $order->status = 1;
      $order->save();

      return back();
    }

    public function tolak($id)
    {
      $order = OrderKontrakan::find($id);
      $order->delete();
      return back();
    }

    public function hapuspemesan($id)
    {
      $order = OrderKontrakan::find($id);
      $order->status = 2;
      $order->save();

      return back();
    }
}
