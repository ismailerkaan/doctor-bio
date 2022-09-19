<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'licance_start',
        'licance_end',
        'city_id',
        'district_id',
        'department_id',
        'phone_number'
    ];

    public function departments()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function details()
    {
        return $this->hasOne(DoctorDetail::class);
    }
}
