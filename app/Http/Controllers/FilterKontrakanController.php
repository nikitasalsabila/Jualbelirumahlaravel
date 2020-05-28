<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontrakan;

class FilterKontrakanController extends Controller
{
  public function tampilPontianakKota()
  {
    $kontrakans = Kontrakan::latest()->where('status',1)->where('kecamatan_id',1)->paginate(6);
    $jumlahkontrakan = Kontrakan::where('status', 1)->where('kecamatan_id',1)->get()->count();
    return view('depan.content.kontrakanpontianakkota', compact('kontrakans', 'jumlahkontrakan'));
  }

  public function tampilPontianakUtara()
  {
    $kontrakans = Kontrakan::latest()->where('status',1)->where('kecamatan_id',2)->paginate(6);
    $jumlahkontrakan = Kontrakan::where('status', 1)->where('kecamatan_id',2)->get()->count();
    return view('depan.content.kontrakanpontianakutara', compact('kontrakans', 'jumlahkontrakan'));
  }

  public function tampilPontianakTimur()
  {
    $kontrakans = Kontrakan::latest()->where('status',1)->where('kecamatan_id',3)->paginate(6);
    $jumlahkontrakan = Kontrakan::where('status', 1)->where('kecamatan_id',3)->get()->count();
    return view('depan.content.kontrakanpontianaktimur', compact('kontrakans', 'jumlahkontrakan'));
  }

  public function tampilPontianakBarat()
  {
    $kontrakans = Kontrakan::latest()->where('status',1)->where('kecamatan_id',4)->paginate(6);
    $jumlahkontrakan = Kontrakan::where('status', 1)->where('kecamatan_id',4)->get()->count();
    return view('depan.content.kontrakanpontianakbarat', compact('kontrakans', 'jumlahkontrakan'));
  }

  public function tampilPontianakSelatan()
  {
    $kontrakans = Kontrakan::latest()->where('status',1)->where('kecamatan_id',5)->paginate(6);
    $jumlahkontrakan = Kontrakan::where('status', 1)->where('kecamatan_id',5)->get()->count();
    return view('depan.content.kontrakanpontianakselatan', compact('kontrakans', 'jumlahkontrakan'));
  }

  public function tampilPontianakTenggara()
  {
    $kontrakans = Kontrakan::latest()->where('status',1)->where('kecamatan_id',6)->paginate(6);
    $jumlahkontrakan = Kontrakan::where('status', 1)->where('kecamatan_id',6)->get()->count();
    return view('depan.content.kontrakanpontianaktenggara', compact('kontrakans', 'jumlahkontrakan'));
  }
}
