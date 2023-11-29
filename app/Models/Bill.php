<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'previous_reading',
        'current_reading',
        'metric_rate',
        'metric_type',
        'reading',
        'amount',
        'status',
        'balance',
        'due_date',
        'room_id',
    ];

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
