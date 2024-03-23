<?php

namespace App\Models;

use App\ModelS\customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    public function customer()
    {

        return $this->belongsTo(customer::class);
    }
}