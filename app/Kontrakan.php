<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use App\Kecamatan;

class Kontrakan extends Model
{
    use Rateable;

    protected $fillable = [
      'judul', 'kecamatan_id', 'isi', 'alamat', 'lat', 'lng', 'harga', 
      'kecamatan', 'foto', 'luastanah', 'ac', 'jlhkamarmandi', 'jlhkamar', 'garasi'
    ];

    public function users()
    {
      return $this->belongsTo(User::class);
    }

    public function kecamatans()
    {
      return $this->belongsTo(Kecamatan::class);
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
