<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendingCountry extends Model
{
    use HasFactory;

    protected $fillable = [ 'country_name', 'is_active'];

    public static function getActiveCountries()
    {
        return self::where('is_active', true)->get();
    }

public function conversionRates()
{
    return $this->hasMany(ConversionRate::class, 'sending_country_id');
}
}
