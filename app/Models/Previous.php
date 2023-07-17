<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Previous extends Model
    {
        use HasFactory;
        protected $fillable=[
            'personelinfos_id',
            'ville_precedant' ,
            'quartier_precedant',
            'lot_precedant',
            'date_liberation',
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
