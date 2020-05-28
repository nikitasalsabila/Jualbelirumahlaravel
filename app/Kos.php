<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use App\Kecamatan;
use App\Kamar;

class Kos extends Model
{
  use Rateable;

  protected $fillable = [
    'judul', 'kecamatan_id', 'isi', 'alamat', 'lat', 'lng', 'harga', 'foto', 
    'jumlahkamar', 'tipe', 'luaskamar', 'ac', 'wifi', 'garasi', 'kamarmandi'
  ];

  public function users()
  {
    return $this->belongsTo(User::class);
  }

  public function kecamatans()
  {
    return $this->belongsTo(Kecamatan::class);
  }

  public function kamars()
  {
    return $this->hasMany(Kamar::class);
  }

  public function getNama()
  {
    return User::where('id', $this->user_id)->first()->name;
  }

  public function getAlamat()
  {
    return User::where('id', $this->user_id)->first()->alamat;
  }

  public function getAvatar()
  {
    return User::where('id', $this->user_id)->first()->avatar;
  }

  public function getEmail()
  {
    return User::where('id', $this->user_id)->first()->email;
  }

  public function getNohp()
  {
    return User::where('id', $this->user_id)->first()->no_hp;
  }

  public function getNoktp()
  {
    return User::where('id', $this->user_id)->first()->no_ktp;
  }

  public function getKecamatan()
  {
    return Kecamatan::where('id', $this->kecamatan_id)->first()->nama_kecamatan;
  }
}
