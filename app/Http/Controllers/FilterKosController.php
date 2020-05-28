<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kos;

class FilterKosController extends Controller
{
    public function tampilPontianakKota()
    {
      $koses = Kos::latest()->where('status',1)->where('kecamatan_id',1)->paginate(6);
      $jumlahkos = Kos::where('status', 1)->where('kecamatan_id',1)->get()->count();
      return view('depan.content.kospontianakkota', compact('koses', 'jumlahkos'));
    }

    public function tampilPontianakUtara()
    {
      $koses = Kos::latest()->where('status',1)->where('kecamatan_id',2)->paginate(6);
      $jumlahkos = Kos::where('status', 1)->where('kecamatan_id',2)->get()->count();
      return view('depan.content.kospontianakutara', compact('koses', 'jumlahkos'));
    }

    public function tampilPontianakTimur()
    {
      $koses = Kos::latest()->where('status',1)->where('kecamatan_id',3)->paginate(6);
      $jumlahkos = Kos::where('status', 1)->where('kecamatan_id',3)->get()->count();
      return view('depan.content.kospontianaktimur', compact('koses', 'jumlahkos'));
    }

    public function tampilPontianakBarat()
    {
      $koses = Kos::latest()->where('status',1)->where('kecamatan_id',4)->paginate(6);
      $jumlahkos = Kos::where('status', 1)->where('kecamatan_id',4)->get()->count();
      return view('depan.content.kospontianakbarat', compact('koses', 'jumlahkos'));
    }

    public function tampilPontianakSelatan()
    {
      $koses = Kos::latest()->where('status',1)->where('kecamatan_id',5)->paginate(6);
      $jumlahkos = Kos::where('status', 1)->where('kecamatan_id',5)->get()->count();
      return view('depan.content.kospontianakselatan', compact('koses', 'jumlahkos'));
    }

    public function tampilPontianakTenggara()
    {
      $koses = Kos::latest()->where('status',1)->where('kecamatan_id',6)->paginate(6);
      $jumlahkos = Kos::where('status', 1)->where('kecamatan_id',6)->get()->count();
      return view('depan.content.kospontianaktenggara', compact('koses', 'jumlahkos'));
    }
}
