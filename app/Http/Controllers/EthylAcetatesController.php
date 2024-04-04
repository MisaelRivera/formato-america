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
        $ethylAcetates = EthylAcetate::where('obsoleto', 0)
            ->orderBy('id', 'desc')
            ->paginate(40);
            
        return Inertia::render('acetatos_etilos/Index', [
            'ethylAcetatesProp' => $ethylAcetates
        ]);
    }

    public function create ()
    {
        return Inertia::render('acetatos_etilos/Create');
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

    public function update (Request $request, $id)
    {
        $data = $request->validate([
            'lote' => 'required',
            'marca' => 'required'
        ]);
        EthylAcetate::where('id', $id)
            ->update([
                'lote' => $data['lote'], 
                'marca' => $data['marca']
            ]);

        return redirect()
            ->route('ethylAcetates.index')
            ->with('message', 'Se ha actualizado el acetato de etilo correctamente');
    }

    public function setObsolete ($id)
    {
        $ethylAcetate = EthylAcetate::where('id', $id)
            ->first();
        $ethylAcetate->obsoleto = 1;

        $ethylAcetate->save();

        return redirect()
            ->route('ethylAcetates.index')
            ->with('message', "Se ha hecho obsoleto el acetato de etilo con lote $ethylAcetate->lote");
    }

    public function getEthylAcetates ()
    {
        $ethylAcetates = EthylAcetate::where('obsoleto', 0)
            ->orderBy('id', 'desc')
            ->paginate(40);
        return response()->json($ethylAcetates);
    }

    public function getEthylAcetateById ($id)
    {
        $ethylAcetate = EthylAcetate::where('id', $id)
            ->where('obsoleto', 0)
            ->first();
        return response()->json($ethylAcetate);
    }
}
