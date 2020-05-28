<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KomentarKontrakan;
use willvincent\Rateable\Rating;
use Auth;
use App\Kontrakan;

class KomentarKontrakanController extends Controller
{
    public function __construct()
    {
      $this->middleware('commentkontrakan');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $komentar = new KomentarKontrakan;

      $komentar->kontrakan_id = $request->kontrakan_id;
      $komentar->user_id = $request->user_id;
      $komentar->nama = $request->nama;
      $komentar->nohp = $request->nohp;
      $komentar->email = $request->email;
      $komentar->isi = $request->isi;

      $komentar->save();

      $rating = new Rating;
      $rating->rating = $request->star;
      $rating->user_id = Auth::user()->id;

      $kontrakan2 = Kontrakan::find($komentar->kontrakan_id);

      $kontrakan2->ratings()->save($rating);

      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
