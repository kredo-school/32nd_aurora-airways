<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;


    protected $fillable = [
        'from', 'to', 'departure_date', 'departure_time', 'arrival_time', 'price', 'trip_category'];


}

