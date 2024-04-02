<?php

namespace App\Http\Controllers;

use App\Models\Carboy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarboysController extends Controller
{
    //
    public function index ()
    {
        $carboys = Carboy::paginate(40);
        return Inertia::render('garrafones/Index', [
            'carboys' => $carboys
        ]);
    }
}
