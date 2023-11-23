<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;


    protected $fillable = [
        'description',
        'time',
        'image',
        'room_id'
    ];


    public function room () {
        return $this->belongsTo(Room::class);
    }

}
