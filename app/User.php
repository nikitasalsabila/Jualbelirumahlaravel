<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use willvincent\Rateable\Rateable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Kontrakan;
use App\Kos;
use App\Pengaduan;

class User extends Authenticatable
{
    use Notifiable;
    use Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','alamat','no_ktp','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kontrakans()
    {
      return $this->hasMany(Kontrakan::class);
    }

    public function koses()
    {
      return $this->hasMany(Kos::class);
    }

    public function pengaduans()
    {
      return $this->hasMany(Pengaduan::class);
    }
}
