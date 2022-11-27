<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\Reducer;
use App\Models\Serie;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('catalog.serie', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->push('Главная', route('home'));

    /** @var Serie $serie */
    $serie = Serie::query()->where('slug', '=', $slug)->first();

    $trail->push($serie->name);
});

Breadcrumbs::for('catalog.detail', function (BreadcrumbTrail $trail, string $slug, int $reducer_id): void {
    $trail->push('Главная', route('home'));

    /** @var Serie $serie */
    $serie = Serie::query()->where('slug', '=', $slug)->first();
    $trail->push($serie->name, route('catalog.serie', ['slug' => $serie->slug]));

    /** @var Reducer $reducer */
    $reducer = Reducer::query()
        ->where('serie_id', '=', $serie->id)
        ->findOrFail($reducer_id);

    $trail->push($reducer->title);
});

Breadcrumbs::for('catalog.configurator', function (BreadcrumbTrail $trail, int $reducer_id): void {
    $trail->push('Главная', route('home'));

    /** @var Reducer $reducer */
    $reducer = Reducer::query()
        ->findOrFail($reducer_id);

    /** @var Serie $serie */
    $serie = $reducer->serie;
    $trail->push($serie->name, route('catalog.serie', ['slug' => $serie->slug]));
    $trail->push($reducer->title, route('catalog.detail', ['slug' => $serie->slug, 'reducer_id' => $reducer->id]));

    $trail->push('Конфигуратор ' . $reducer->title);
});

Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Главная', route('home'));

    $trail->push('Статьи');
});

Breadcrumbs::for('articles.detail', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->push('Главная', route('home'));

    $trail->push('Статьи', route('articles.index'));

    /** @var Article $article */
    $article = Article::query()
        ->where('is_published', true)
        ->where('slug', $slug)
        ->firstOrFail();

    $trail->push($article->title);
});
