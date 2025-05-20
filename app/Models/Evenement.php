<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;

    // Champs modifiables
    protected $fillable = [
        'theme',
        'description',
        'date_debut',
        'date_fin',
        'cout_journalier',
        'expert_id'
    ];

    // Relation avec l'expert
    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    // Relation avec les ateliers
    public function ateliers()
    {
        return $this->hasMany(Atelier::class);
    }
}
