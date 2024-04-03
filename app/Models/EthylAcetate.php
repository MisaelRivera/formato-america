<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class EthylAcetate extends Model
{
    use HasFactory;
    protected $table = "acetatos_etilos";
    protected $fillable = ['lote', 'marca'];
    public $timestamps = false;

    public function analysis ()
    {
        return $this->hasMany(Analysis::class, 'lote_acetato_etilo', 'lote');
    }
}
