<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Livraison extends Model
{
    use HasFactory;

    /***
     * Relations 
     * 
     * */
    protected $fillable = [
        'livreur_id',
    ];

    public function commande()
    {
        return $this->hasOne(Commande::class);
    }

    public function livreur()
    {
        return $this->belongsTo(User::class, 'livreur_id');
    }
    public function commentaire()
    {
        return $this->hasOne(Commentaire::class);
    }
}