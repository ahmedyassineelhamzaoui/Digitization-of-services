<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaimentStatus extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'personelinfos_id',
        'statut',
        'credential_id',
        'payment_id',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
