<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'id_teknisi' , 'id_status', 'id_users', 'full_name', 'email', 'upload_identity', 'kota', 'kecamatan', 'jalan'
    ];

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'id_teknisi', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }
}
