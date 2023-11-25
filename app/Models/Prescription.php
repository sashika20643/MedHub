<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    protected $fillable = [
        'user_id',
        'description',

        'status',
    ];


    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function mainImage()
    {
        return $this->images()->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quotation()
    {
        return $this->hasOne(Quotation::class);
    }
    use HasFactory;
}
