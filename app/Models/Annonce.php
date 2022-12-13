<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'nom', 'prenom', 'condition_id', 'surface',
                            'ville_id', 'photo', 'start_date', 'end_date', 'places', 'vetements', 'draps',
                            'nourriture', 'argent', 'infos', 'phone', 'email'];
}
