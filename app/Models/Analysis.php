<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcidAlcohol;
use App\Models\Carboy;
use App\Models\EthylAcetate;
use App\Models\Equipment;
use App\Models\SampleData;
use App\Models\ZincSulfate;


class Analysis extends Model
{
    use HasFactory;
    protected $table = "analisis";

    public function acidAlcohol ()
    {
        return $this->belongsTo(AcidAlcohol::class, 'id_alcohol_acido', 'id');
    }

    public function carboy ()
    {
        return $this->belongsTo(Carboy::class, 'id_garrafon', 'id');
    }

    public function equipment ()
    {
        return $this->belongsTo(Equipment::class, 'id_equipamiento', 'id');
    }

    public function ethylAcetate ()
    {
        return $this->belongsTo(EthylAcetate::class, 'lote_acetato_etilo', 'lote');
    }

    public function sampleData ()
    {
        return $this->belongsTo(SampleData::class, 'id_datos_muestra', 'id');
    }

    public function zincSulfate ()
    {
        return $this->belongsTo(ZincSulfate::class, 'id_sulfato_zinc', 'id');
    }
}
