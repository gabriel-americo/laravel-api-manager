<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    public $timestamps = false;

    protected $fillable = [
        'name_shippings',
        'last_name_shippings',
        'company_shippings',
        'street_shippings',
        'number_shippings',
        'complement_shippings',
        'district_shippings',
        'city_shippings',
        'zip_shippings',
        'country_shippings',
        'estate_shippings',
        'customer_id'
    ];

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
