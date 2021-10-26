<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'livraison_id'
    ];

    /***
     * Relations 
     * 
     * */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }
}