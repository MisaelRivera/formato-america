<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analysis;

class EthylAcetate extends Model
{
    use HasFactory;
    protected $table = "acetatos_etilos";
    protected $fillable = ['lote', 'marca', 'obsoleto'];
    public $timestamps = false;

    public function analysis ()
    {
        return $this->hasMany(Analysis::class, 'id_acetato_etilo', 'id');
    }
}
