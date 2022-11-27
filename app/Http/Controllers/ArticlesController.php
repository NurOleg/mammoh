<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

final class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->with('tags')
            ->where('is_published', '=', true)
            ->orderByDesc('published_at')
            ->paginate(10);

        $tags = Tag::query()->get();

        return view('articles.index', compact('articles', 'tags'));
    }

    public function show(string $slug): View
    {
        $article = Article::query()
            ->with('reducer.serie')
            ->where('is_published', '=', true)
            ->where('slug', '=', $slug)
            ->firstOrFail();

        $sameArticles = Article::query()
            ->where('is_published', '=', true)
            ->where('slug', '!=', $slug)
            ->orderByDesc('published_at')
            ->take(5)
            ->get();

        return view(
            'articles.detail',
            compact(
                'article',
                'sameArticles',
            )
        );
    }
}
