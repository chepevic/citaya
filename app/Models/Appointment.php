<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cliente_id',
        'professional_id',
        'service_id',
        'starts_at',
        'ends_at',
        'status',
        'notes'

    ];

     protected function casts():array{
        return [
            'starts_at'=>'datetime',
            'ends_at'=>'datetime'

        ];
    }
}
