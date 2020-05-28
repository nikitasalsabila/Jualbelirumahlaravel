<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kos;
use App\Kecamatan;
use Image;
use Auth;
use App\KomentarKos;
use App\Kamar;
use App\OrderKos;

class KosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
      $koses = Kos::latest()->where('status', 1)->paginate(6);
      $jumlahkos = Kos::where('status',1)->get()->count();
      return view('depan.content.kos', compact('koses', 'jumlahkos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $kecamatans = Kecamatan::all();
      return view('depan.content.tambahkos', compact('kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $foto = $request->file('foto');
      $filename = time().'.'.$foto->getClientOriginalExtension();
      Image::make($foto)->resize(400,400)->save( public_path('/uploads/foto/'.$filename));
      Auth::user()->koses()->create([
        'judul' => $request->judul,
        'kecamatan_id' =>$request->kecamatan,
        'isi' => $request->isi,
        'alamat' => $request->alamat,
        'lat' => $request->lat,
        'lng' => $request->lng,
        'harga' => $request->harga,
        'foto' => $filename,
        'luaskamar' => $request->luaskamar,
        'ac' => $request->ac,
        'wifi' => $request->wifi,
        'garasi' => $request->garasi,
        'kamarmandi' => $request->kamarmandi,
        'jumlahkamar' => $request->jumlahkamar,
        'tipe' => $request->tipe,
      ]);

      $jlhkamar = $request->jumlahkamar;
      $kos = Kos::latest()->first();

      for ($i=0; $i < $jlhkamar; $i++) {
        $kamar = new Kamar;
        $kamar->kos_id = $kos->id;
        $kamar->nomorkamar = $i+1;
        $kamar->save();
      }

      return redirect()->route('rumahkos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kos $kos, $id)
    {
      $kos2 = Kos::find($id);
      $komentar_koses = KomentarKos::where('kos_id',$kos2->id)->get();
      $ratingkos = round($kos2->averageRating);
      $kamars = Kamar::where('kos_id',$kos2->id)->get();
      $orders = OrderKos::where('kos_id',$kos2->id)->where('status',0)->get();
      return view ('depan.content.kosdetail', compact('kos2','komentar_koses','ratingkos','kamars','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $kos = Kos::find($id);
      $kecamatans = Kecamatan::all();
      return view('depan.content.editkos', compact('kos', 'kecamatans'));
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
      $kos = Kos::find($id);
      $foto = $request->file('foto');
      $filename = time().'.'.$foto->getClientOriginalExtension();
      Image::make($foto)->resize(400,400)->save( public_path('/uploads/foto/'.$filename));
      Auth::user()->koses()->update([
        'judul' => $request->judul,
        'kecamatan_id' =>$request->kecamatan,
        'isi' => $request->isi,
        'alamat' => $request->alamat,
        'lat' => $request->lat,
        'lng' => $request->lng,
        'harga' => $request->harga,
        'foto' => $filename,
        'luaskamar' => $request->luaskamar,
        'ac' => $request->ac,
        'wifi' => $request->wifi,
        'garasi' => $request->garasi,
        'kamarmandi' => $request->kamarmandi,
        'tipe' => $request->tipe,
      ]);

      return redirect()->route('rumahkos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kos = Kos::find($id);
      $kos->delete();
      return redirect()->route('rumahkos.index');
    }
}
