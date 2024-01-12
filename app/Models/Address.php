<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = ['store_id', 'provinsi', 'kabupaten', 'kecamatan'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    // Address.php (Model)

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'kabupaten', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kecamatan', 'code');
    }

    public static function saveAddress($store_id, $provinsi, $kabupaten, $kecamatan)
    {
        try {
            $address = static::create([
                'store_id' => $store_id,
                'provinsi' => $provinsi,
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
            ]);

            return $address;
        } catch (\Exception $e) {
            // Handle error, misalnya log pesan kesalahan
            \Log::error('Error in saveAddress: ' . $e->getMessage());
            throw $e; // Rethrow the exception after logging
        }
    }
}