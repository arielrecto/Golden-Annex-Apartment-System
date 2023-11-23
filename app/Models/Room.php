<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    protected $fillable = [
        'room_number',
        'floor',
        'status',
        'household_people',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bills (){
        return $this->hasMany(Bill::class);
    }
    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }
}
