<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conjoint extends Model
{
    use HasFactory;
    protected $fillable =[
        'personelinfos_id',
        'nom_prenom',
        'fonction',
        'matricule_Conjoint',
        'service_empolyeur',
        'date_embauche',
        'adress_conjoint',
        'regime',
        'taux_indemnite',
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
