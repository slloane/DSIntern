<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeStage extends Model
{
    use HasFactory;

    protected $fillable = ['lettre_motivation','url_cv','statut_demande'];


    public function offre_stage()
    {
        return $this->belongsTo(OffreStage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
