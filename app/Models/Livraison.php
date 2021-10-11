<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    /***
     * Relations 
     * 
     * */
    public function commande()
    {
        return $this->hasOne(Commande::class);
    }

    public function livreur()
    {
        return $this->belongsTo(User::class, 'livreur_id');
    }
}