<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontrakan;

class AdminKontrakanController extends Controller
{
    //  method ini digunakan untuk
    //  memverifikasi apakah admin telah login
    //  jika belum login sbg admin maka akan di redirect ke halaman login
    //  dan jika user biasa berusaha mengakses halaman admin akan di redirect ke halaman sebelumnya
    //  jadi hanya admin yg sudah login yg bisa mengaksesnya
    // ------------------------------------------------------------------------------------------------------
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    // menampilkan halaman verifikasi kontrakan
    // menampilkan data kontrakan yang berstatus 0
    //--------------------------------------------------------------------------
    public function belumTampil()
    {
      $kontrakans = Kontrakan::where('status',0)->get();
      return view('belakang.content.verifikasikontrakan', compact('kontrakans'));
    }

    // untuk menyimpan atau mengupdate data kontrakan
    // merubah status 0 menjadi 1
    //-------------------------------------------------------------------------
    public function store(Request $request, $id)
    {
      $kontrakan = Kontrakan::find($id);
      $kontrakan->status = 1;
      $kontrakan->save();
      return redirect()->route('admin.verifikasikontrakan');
    }

    // untuk menampilkan halaman data kontrakan
    // menampilkan data kontrakan yang berstatus 1
    // ----------------------------------------------------------------------
    public function tampil()
    {
      $kontrakans = Kontrakan::where('status',1)->get();
      return view('belakang.content.datakontrakan', compact('kontrakans'));
    }

    public function destroy($id)
    {
      $kontrakan = Kontrakan::find($id);
      $kontrakan->delete();
      return redirect()->route('admin.datakontrakan');
    }
}
