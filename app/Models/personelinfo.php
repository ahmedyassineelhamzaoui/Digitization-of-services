<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personelinfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule',
        'nom',
        'prenom' ,
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'email',
        'telephone',
        'adresse' ,
        'type_piece' ,
        'numero_piece' ,
        'region' ,
        'localite' ,
        'corps_anterieur',
        'corps',
        'minstere_anterieur' ,
        'minstere',
        'fonction' ,
        'fonction_anterieur',
        'service',
        'arret',
        'date_nomination' ,
        'date_effet',
        'date_fin',
        'situation_matrimoniale'
 ];
}
