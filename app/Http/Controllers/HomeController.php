<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Contracts\View\View;

final class HomeController extends Controller
{
    public function __invoke(): View
    {
        $series = Serie::all();

        return view('home', compact('series'));
    }
}
