<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Komentaruser;
use Image;
use Auth;
use willvincent\Rateable\Rating;
use App\OrderKos;
use App\OrderKontrakan;
use App\Kos;
use App\Kontrakan;

class ProfilController extends Controller
{
    public function __construct()
    {
      $this->middleware('commentuser', ['except' => ['index', 'ubahprofil']]);
    }

    public function index($id)
    {
      $user = User::find($id);
      $ratinguser = round($user->averageRating);
      $komentars = Komentaruser::where('receive_id',$user->id)->get();
      return view('depan.content.halamanprofil',compact('ratinguser','user','komentars'));
    }

    public function ubahprofil(Request $request,$id)
    {
      if($request->hasFile('avatar')){

        $avatar = $request->file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(200,200)->save( public_path('/uploads/user/'.$filename));

        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->avatar = $filename;
        $user->no_hp = $request->no_hp;
        $user->no_ktp = $request->no_ktp;
        $user->save();
        return redirect()->back();
      }
      else
      {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->no_ktp = $request->no_ktp;
        $user->save();
        return redirect()->back();
      }
    }

    public function tambahkomentar(Request $request, $id)
    {
      $user = User::find($id);

      $rating = new Rating;
      $rating->rating = $request->star;
      $rating->user_id = Auth::user()->id;

      $user->ratings()->save($rating);

      $komentar = new Komentaruser;
      $komentar->sender_id = Auth::user()->id;
      $komentar->receive_id = $user->id;
      $komentar->isi = $request->isi;
      $komentar->save();

      return back();
    }

    public function pemesanankos($id)
    {
      $koses = Kos::where('user_id',$id)->get();
      return view('depan.content.pemesanankos', compact('koses'));
    }

    public function pemesanankontrakan($id)
    {
      $kontrakans = Kontrakan::where('user_id', $id)->get();
      return view('depan.content.pemesanankontrakan', compact('kontrakans'));
    }

    public function riwayatpemesanan($id)
    {
      $riwayatkos = OrderKos::where('user_id',Auth::user()->id)->get();
      $riwayatkontrakan = OrderKontrakan::where('user_id',Auth::user()->id)->get();
      return view('depan.content.riwayat', compact('riwayatkos','riwayatkontrakan'));
    }
}
