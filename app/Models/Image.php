<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'prescription_id',
        'path',
    ];
    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
    use HasFactory;
}
