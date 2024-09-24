<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subvention extends Model
{
    protected $fillable = [
        'nom_complet', 'email', 'telephone', 'adresse', 'type_agriculture', 'type_organisation', 'description_beneficiaire',
        'surface_exploitation', 'type_plantes', 'nombre_animaux', 'piece_identite', 'description_projet', 'montant_demande'
    ];
    }