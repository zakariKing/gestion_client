<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable=['nom','prenom',
        'created_at',
        'updated_at'];
    public function comptes(){
        return $this->hasMany(Compte::class);
    }
}
