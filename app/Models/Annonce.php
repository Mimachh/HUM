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


    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function fav()
    {
        return $this->belongsToMany('App\Models\User');
    }
    
    public function fav_added()
    {
         if (auth()->check()) {
            return auth()->user()->fav->contains('id', $this->id);      
        }   
    }
}
