<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudient extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'adresse', 'phone', 'email', 'date_naissance', 'villeId'];
    
}
