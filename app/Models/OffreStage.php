<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OffreStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_stage', 'duree_stage',
        'sujet_stage','profil_requis',
        'lieu_stage','description_stage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demande_stages()
    {
        return $this->hasMany(DemandeStage::class);
    }
}
