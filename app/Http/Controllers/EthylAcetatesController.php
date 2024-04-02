<?php

namespace App\Http\Controllers;

use App\Models\EthylAcetate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EthylAcetatesController extends Controller
{
    //
    public function index ()
    {
        $ethylAcetates = EthylAcetate::paginate(40);
        return Inertia::render('acetatos_etilos/Index', [
            'ethylAcetatesProp' => $ethylAcetates
        ]);
    }
}
