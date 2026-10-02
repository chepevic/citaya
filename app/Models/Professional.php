<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professional extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'user_id',
        'specialty',
        'bio',
        'is_active'
    ];

    protected function casts():array{
        return [
            'is_active'=>'boolean'

        ];
    }
}
