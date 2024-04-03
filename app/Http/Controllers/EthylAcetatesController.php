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
        $ethylAcetates = EthylAcetate::orderBy('lote', 'desc')
            ->paginate(40);
            
        return Inertia::render('acetatos_etilos/Index', [
            'ethylAcetatesProp' => $ethylAcetates
        ]);
    }

    public function store (Request $request)
    {
        $data = $request->validate([
            'lote' => 'required',
            'marca' => 'required',
        ]);

        $ethylAcetate = EthylAcetate::create($data);

        return redirect()
            ->route('ethylAcetates.index')
            ->with('message', 'Se ha creado un nuevo acetato de etilo correctamente');
    }

    public function getEthylAcetates ()
    {
        $ethylAcetates = EthylAcetate::orderBy('lote', 'desc')
        ->paginate(40);
        return response()->json($ethylAcetates);
    }
}
