<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pengaduan extends Model
{
  protected $fillable = ['judul', 'isi'];

  public function users()
  {
    return $this->belongsTo(User::class);
  }

  public function getNama()
  {
    return User::where('id', $this->user_id)->first()->name;
  }
}
