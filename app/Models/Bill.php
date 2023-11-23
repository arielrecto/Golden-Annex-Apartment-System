<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'amount',
        'due_date',
        'room_id',
    ];

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
