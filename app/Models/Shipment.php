<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable=[
        'address',
        'waybill',
        'name',
        'phone',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'shipment_id', 'id');
    }
}
