<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;
    protected $table = "weapons";
    protected $fillable = ['rifle', 'type,', 'country', 'description', 'price'];
}
