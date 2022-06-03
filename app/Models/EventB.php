<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventB extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','hobbies'];
}
