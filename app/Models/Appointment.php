<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Noifiable;

class Appointment extends Model
{
    use HasFactory;
    protected $table="appointments";
}
