<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'attestation',
        
        
    ];

    public function demande_stages()
    {
        return $this->belongsTo(DemandeStage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
