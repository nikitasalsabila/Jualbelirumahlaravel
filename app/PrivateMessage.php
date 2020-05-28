<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PrivateMessage extends Model
{
    public function getNama()
    {
      return User::where('id',$this->sender_id)->first()->name;
    }

    public function getAvatar()
    {
      return User::where('id',$this->sender_id)->first()->avatar;
    }
}
