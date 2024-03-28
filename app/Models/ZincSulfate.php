<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class ZincSulfate extends Model
{
    use HasFactory;
    protected $table = 'sulfatos_zinc';

    public function analysis ()
    {
        return $this->hasMany(Analysis::class, 'id_sulfato_zinc', 'id');
    }
}
