<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'ref_number',
        'image',
        'bill_id',
        'amount'
    ];

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
}
