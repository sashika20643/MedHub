<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    protected $fillable = [
        'user_id',
        'description',
        'prescription_file',
        'status',
    ];
    use HasFactory;
}
