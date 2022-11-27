<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Serie;
use Illuminate\Contracts\View\View;

final class HomeController extends Controller
{
    public function __invoke(): View
    {
        $series = Serie::all();

        $articles = Article::query()
            ->with('tags')
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        $firstArticle = $articles->shift();
        $articles = $articles->all();

        return view('home', compact('series', 'firstArticle', 'articles'));
    }
}
