<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    public $timestamps = false;

    protected $fillable = [
        'name_addresses',
        'last_name_addresses',
        'document_addresses',
        'company_addresses',
        'birth_addresses',
        'sex_addresses',
        'street_addresses',
        'number_addresses',
        'complement_addresses',
        'district_addresses',
        'city_addresses',
        'zip_addresses',
        'country_addresses',
        'estate_addresses',
        'phone_addresses',
        'cell_addresses',
        'email_addresses',
        'site_addresses',
        'customer_id'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
