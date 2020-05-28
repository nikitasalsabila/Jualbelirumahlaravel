<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rating;

class KomentarKontrakan extends Model
{
  public function getAvatar()
  {
    return User::where('id', $this->user_id)->first()->avatar;
  }

  public function getRating()
  {
    return Rating::where('user_id', $this->user_id)->where('rateable_id',$this->kontrakan_id)->first()->rating;
  }
}
