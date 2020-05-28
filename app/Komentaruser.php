<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rating;

class Komentaruser extends Model
{
  public function getNamaPengirim()
  {
    return User::where('id', $this->sender_id)->first()->name;
  }

  public function getFotoPengirim()
  {
    return User::where('id', $this->sender_id)->first()->avatar;
  }

  public function getRating()
  {
    return Rating::where('user_id', $this->sender_id)->where('rateable_id',$this->receive_id)->first()->rating;
  }
}
