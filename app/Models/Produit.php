<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'description'];

    public function commandes() {
        return $this->hasMany(Commande::class);
    }

    public function details() {
        return $this->hasMany(DetailCommande::class);
    }
}
