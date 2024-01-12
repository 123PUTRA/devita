<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use App\Models\Address;
use Laravolt\Indonesia\Models\City;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'category', 'description', 'npwp', 'provinsi', 'kabupaten', 'kecamatan'
    ];

     public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'kabupaten');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kecamatan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // dalam file app/Models/Store.php
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }

}
