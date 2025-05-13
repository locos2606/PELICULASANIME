<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivePeliculas extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente
    protected $fillable = ['title', 'drive_url'];
}
