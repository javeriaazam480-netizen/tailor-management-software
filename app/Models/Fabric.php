<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;

    protected $table = 'fabrics';

    protected $fillable = [
        'name',
        'stock',
        'price_per_meter',
        'brand',
        'category',
        'quality',
        'unit',
        'status',
    ];
}
