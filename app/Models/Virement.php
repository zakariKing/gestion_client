<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    protected $fillable = [
        'compte_recepteur_id',
        'compte_emetteur_id',
        'montant',
    ];

    public function compteEmetteur()
    {
        return $this->belongsTo(Compte::class, 'compte_emetteur_id');
    }

    public function compteRecepteur()
    {
        return $this->belongsTo(Compte::class, 'compte_recepteur_id');
    }
}
