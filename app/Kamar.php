<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kos;

class Kamar extends Model
{
    public function kos()
    {
      return $this->belongsTo(Kos::class);
    }

    public function getNama()
    {
      return User::where('id', $this->user_id)->first()->name;
    }
}
