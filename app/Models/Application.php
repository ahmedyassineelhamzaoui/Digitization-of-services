<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable =[
        'status',
        'message'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function file()
    // {
    //     return $this->hasOne(File::class);
    // }
    // public function personelinfo()
    // {
    //     return $this->hasOne(Personelinfo::class);
    // }
    // public function paiment()
    // {
    //     return $this->hasOne(Paiment::class);
    // }
    // public function previous()
    // {
    //     return $this->hasOne(Previous::class);
    // }
    // public function conjoint()
    // {
    //     return $this->hasOne(Conjoint::class);
    // }
    // public function current()
    // {
    //     return $this->hasOne(Current::class);
    // }
    
}
