<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
