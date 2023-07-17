<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable =[
        'personelinfos_id',
        'decisionnomination_path',
        'decisionaffectation_path',
        'certificatpriseservice_path',
        'Bulletinsoldeavant_path' ,
        'Bulletinsoldeapres_path',
        'certifcatnomhebergement_path' ,
        'attestationhonneurlegalise_path',
        'certificatresidence_path',
        'pieceidentite_path' ,
        'actemariage_path'
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
