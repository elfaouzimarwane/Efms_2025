<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atelier extends Model
{
    use HasFactory;

    // Champs modifiables / الحقول القابلة للتعديل
    protected $fillable = ['nom', 'evenement_id'];

    // Relation avec l'événement / العلاقة مع الحدث
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
