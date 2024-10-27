<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use hasfactory;
    protected $fillable = [
        'rib',
        'solde',
        'client_id',
        'created_at',
        'updated_at'
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function virementsEmis()
    {
        return $this->hasMany(Virement::class, 'compte_emetteur_id');
    }

    public function virementsRecus()
    {
        return $this->hasMany(Virement::class, 'compte_beneficiaire_id');
    }
}
