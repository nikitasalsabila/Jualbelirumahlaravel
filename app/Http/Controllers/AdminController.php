<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //  method ini digunakan untuk
    //  memverifikasi apakah admin telah login
    //  jika belum login sbg admin maka akan di redirect ke halaman login
    //  dan jika user biasa berusaha mengakses halaman admin akan di redirect ke halaman sebelumnya
    //  jadi hanya admin yg sudah login yg bisa mengaksesnya
    // ------------------------------------------------------------------------------------------------------
   public function __construct()
   {
      return $this->middleware('auth:admin');
   }

   // method ini digunakan untuk menampilkan halaman admin home
   //  ------------------------------------------------------------
   public function index()
   {
     return view('belakang.content.home');
   }
}
