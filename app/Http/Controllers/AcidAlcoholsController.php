<?php

namespace App\Http\Controllers;

use App\Models\AcidAlcohol;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AcidAlcoholsController extends Controller
{
    //
    public function index ()
    {
        $acidAlcohols = AcidAlcohol::paginate(40);
        return Inertia::render('alcoholes_acidos/Index', [
            'acidAlcohols' => $acidAlcohols
        ]);
    }
}
