<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration_minutes',
        'price',
        'is_active'
    ];

    protected function cast():array{

    return [
        'duration_minutes'=>'integer',
        'price'=>'decimal:2',
        'is_active'=>'boolean'
    ];


    }
}
