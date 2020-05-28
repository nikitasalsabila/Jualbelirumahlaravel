<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class OrderKos extends Model
{
  public function getNama()
  {
    return User::where('id', $this->user_id)->first()->name;
  }

  public function getNomorKamar()
  {
    return Kamar::where('id', $this->kamar_id)->first()->nomorkamar;
  }

  public function getNamaKos()
  {
    return Kos::where('id', $this->kos_id)->first()->judul;
  }

  public function getAlamatKos()
  {
    return Kos::where('id', $this->kos_id)->first()->alamat;
  }
}
