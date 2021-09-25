<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function users_likes()
    {
        return $this->belongsToMany(User::class, 'users_like_produits');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
}