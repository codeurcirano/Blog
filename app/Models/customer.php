<?php

namespace App\Models;

use App\ModelS\invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public function invoices()
    {

        return $this->hasMany(invoice::class);
    }
}

class Bien extends Model
{
    // Propriétés spécifiques à votre application
    public $titre;
    public $description;
    public $prix;
    public $adresse;
    public $code_postal;
    public $ville;
    public $type;

    // Méthodes spécifiques à votre application
    public function getFormattedPrice()
    {
        return number_format($this->prix, 2, ',', ' ');
    }
}