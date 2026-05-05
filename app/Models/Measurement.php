<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $table = 'measurements';

    protected $fillable = [
        'client_id',
        'garment_type',
        'shoulder',
        'chest',
        'waist',
        'hip',
        'sleeve',
        'bicep',
        'wrist',
        'neck',
        'arm_hole',
        'length',
        'inseam',
        'outseam',
        'notes',
    ];
}
