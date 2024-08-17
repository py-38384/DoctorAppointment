<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
