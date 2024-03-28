<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class AcidAlcohol extends Model
{
    use HasFactory;
    protected $table = "alcoholes_acidos";

    public function analysis ()
    {
        return $this->hasMany(Analysis::class, 'id_alcohol_acido', 'id');
    }
}
