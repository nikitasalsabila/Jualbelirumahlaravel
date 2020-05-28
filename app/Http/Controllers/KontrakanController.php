<?php

namespace App\Http\Controllers;

use App\Kontrakan;
use Illuminate\Http\Request;
use App\Kecamatan;
use Auth;
use Image;
use App\KomentarKontrakan;
use App\OrderKontrakan;

class KontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('auth',['except' => ['index','tampilPontianakKota']]);
     }

    public function index()
    {
        $kontrakans =  Kontrakan::latest()->where('status',1)->paginate(6);
        $jumlahkontrakan = Kontrakan::where('status', 1)->get()->count();
        return view('depan.content.kontrakan',compact('kontrakans','jumlahkontrakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('depan.content.tambahkontrakan', compact('kecamatans'));
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
      Auth::user()->kontrakans()->create([
      'judul' => $request->judul,
      'kecamatan_id' =>$request->kecamatan,
      'isi' => $request->isi,
      'alamat' => $request->alamat,
      'lat' => $request->lat,
      'lng' => $request->lng,
      'harga' => $request->harga,
      'foto' => $filename,
      'luastanah' => $request->luastanah,
      'ac' => $request->ac,
      'jlhkamarmandi' => $request->jlhkamarmandi,
      'jlhkamar' => $request->jlhkamar,
      'garasi' => $request->garasi
      ]);

      return redirect()->route('kontrakan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kontrakan  $kontrakan
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrakan $kontrakan)
    {
      $kontrakan2 = Kontrakan::where('id', $kontrakan->id)->first();
      $komentar_kontrakans = KomentarKontrakan::where('kontrakan_id',$kontrakan->id)->get();
      $orderkontrakan = OrderKontrakan::where('status',1)->where('kontrakan_id',$kontrakan->id)->count();
      $dataorderkontrakan = OrderKontrakan::where('status',1)->where('kontrakan_id',$kontrakan->id)->first();
      $ratingkontrakan = round($kontrakan2->averageRating);
      return view ('depan.content.kontrakandetail', compact('kontrakan2','komentar_kontrakans','ratingkontrakan','orderkontrakan','dataorderkontrakan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontrakan  $kontrakan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontrakan = Kontrakan::find($id);
        $kecamatans = Kecamatan::all();
        return view('depan.content.editkontrakan', compact('kontrakan', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kontrakan  $kontrakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kontrakan = Kontrakan::find($id);

        $foto = $request->file('foto');
        $filename = time().'.'.$foto->getClientOriginalExtension();
        Image::make($foto)->resize(400,400)->save( public_path('/uploads/foto/'.$filename));
        Auth::user()->kontrakans()->update([
        'judul' => $request->judul,
        'kecamatan_id' =>$request->kecamatan,
        'isi' => $request->isi,
        'alamat' => $request->alamat,
        'lat' => $request->lat,
        'lng' => $request->lng,
        'harga' => $request->harga,
        'foto' => $filename,
        'luastanah' => $request->luastanah,
        'ac' => $request->ac,
        'jlhkamarmandi' => $request->jlhkamarmandi,
        'jlhkamar' => $request->jlhkamar,
        'garasi' => $request->garasi
        ]);

        return redirect()->route('kontrakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kontrakan  $kontrakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontrakan = Kontrakan::find($id);
        $kontrakan->delete();
        return redirect()->route('kontrakan.index');
    }


}
