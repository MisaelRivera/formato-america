<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipmentController extends Controller
{
    //
    public function index ()
    {
        $equipment = Equipment::paginate(40);
        return Inertia::render('equipos/Index', [
            'equipment' => $equipment,
        ]);
    }
}
