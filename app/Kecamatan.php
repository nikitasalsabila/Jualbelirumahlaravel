<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kontrakan;

class Kecamatan extends Model
{
    public function kontrakans()
    {
        return $this->hasMany(Kontrakan::class);
    }
}
