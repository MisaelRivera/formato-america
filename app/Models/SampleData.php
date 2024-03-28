<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class SampleData extends Model
{
    use HasFactory;
    protected $table = "datos_muestra";

    public function analysis ()
    {
        return $this->hasMany(Analysis::class, 'id_datos_muestra', 'id');
    }
}
