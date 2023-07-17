<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{
    use HasFactory;
    protected $fillable = [
        'personelinfos_id',
        'client_nom',
        'client_prenom',
        'telephone',
        'credential_id',
        'identifiant',
        'nature_recette',
        'montant_total',
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
