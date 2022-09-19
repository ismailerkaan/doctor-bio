<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'header',
        'content',
        'status'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
