<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingCountry extends Model
{
    use HasFactory;

    public static function getActiveCountries()
    {
        return self::where('is_active', true)->get();
    }

}
