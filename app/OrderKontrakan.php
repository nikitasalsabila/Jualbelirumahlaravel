<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kontrakan;
use App\User;

class OrderKontrakan extends Model
{
  public function getNama()
  {
    return User::where('id', $this->user_id)->first()->name;
  }

  public function getNamaKontrakan()
  {
    return Kontrakan::where('id', $this->kontrakan_id)->first()->judul;
  }

  public function getAlamatKontrakan()
  {
    return Kontrakan::where('id', $this->kontrakan_id)->first()->alamat;
  }
}
