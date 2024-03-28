<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class Carboy extends Model
{
    use HasFactory;
    protected $table = "garrafones";

    public function analysis ()
    {
        return $this->hasMany(Analysis::class, 'id_garrafon', 'id');
    }
}
