<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomisedRate extends Model
{
    use HasFactory;

    public static function getRateByCountries($sendingCountryId, $receivingCountryId)
    {
        return self::where('sending_country_id', $sendingCountryId)
            ->where('receiving_country_id', $receivingCountryId)
            ->first();
    }

public static function getCustomisedRate($sendingCountryId, $receivingCountryId)
{
    $conversionRate = self::getRateByCountries($sendingCountryId, $receivingCountryId);
    return $conversionRate ? $conversionRate->customised_rate : 0;
}

public function sendingCountry()
{
    return $this->belongsTo(SendingCountry::class, 'sending_country_id');
}
public function receivingCountry()
{
    return $this->belongsTo(ReceivingCountry::class, 'receiving_country_id');
}

}
