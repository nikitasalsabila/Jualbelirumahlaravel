<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kos;

class AdminKosController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    public function belumTampil()
    {
      $koses = Kos::where('status', 0)->latest()->get();
      return view('belakang.content.verifikasikos', compact('koses'));
    }

    public function store(Request $request, $id)
    {
      $kos = Kos::find($id);
      $kos->status = 1;
      $kos->save();
      return redirect()->route('admin.verifikasikos');
    }

    public function tampil()
    {
      $koses = Kos::where('status',1)->latest()->get();
      return view('belakang.content.datakos', compact('koses'));
    }

    public function destroy($id)
    {
      $kos = Kos::find($id);
      $kos->delete();
      return redirect()->route('admin.datakos');
    }
}
