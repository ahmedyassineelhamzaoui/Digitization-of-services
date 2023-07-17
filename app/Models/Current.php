<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current extends Model
{
    use HasFactory;
    protected $fillable=[
        'personelinfos_id',
        'ville_actuelle',
        'quartier_actuelle',
        'lot_actuelle',
        'date_occupation',
        'nom_parent'
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
