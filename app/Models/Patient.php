<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Noifiable;

class Patient extends Model
{
    use HasFactory,Notifiable;
    protected $table="patients";
}
