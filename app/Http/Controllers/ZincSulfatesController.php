<?php

namespace App\Http\Controllers;

use App\Models\ZincSulfate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ZincSulfatesController extends Controller
{
    //
    public function index ()
    {
        $zincSulfates = ZincSulfate::paginate(40);
        return Inertia::render('sulfatos_zinc/Index', [
            'zincSulfates' => $zincSulfates
        ]);
    }
}
