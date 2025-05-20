<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expert extends Model
{
    use HasFactory;

    // Champs modifiables / الحقول القابلة للتعديل
    protected $fillable = ['nom', 'prenom', 'specialite'];

    // Relation avec les événements / العلاقة مع الأحداث
    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
