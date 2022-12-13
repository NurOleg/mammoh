<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\FavoriteItemsDto;
use App\Http\Requests\RemoveFavoriteItemRequest;
use App\Http\Requests\SendFavoriteFormRequest;
use App\Http\Requests\SetFavoriteItemRequest;
use App\Mail\SendFavoriteFormMail;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use RuntimeException;

final class FormController extends Controller
{
    public function getFavoriteItems(): View
    {
        return view('partials.favorites_list', ['items' => session()->get('favorite_items')]);
    }

    public function removeFavoriteItem(RemoveFavoriteItemRequest $request): string
    {
        $favoriteItems = session()->get('favorite_items') ?? [];

        if ($favoriteItems === null) {
            throw new RuntimeException('У вас нет избранных товаров.');
        }

        $idToRemove = $request->get('id');
        $titleToRemove = $request->get('title');

        foreach ($favoriteItems as $key => $item) {
            if ((int)$item['id'] === $idToRemove && $item['title'] === $titleToRemove) {
                unset($favoriteItems[$key]);
            }
        }

        session()->set('favorite_items', $favoriteItems);

        return view('partials.favorites', ['items' => session()->get('favorite_items') ?? []])->render();
    }

    public function setFavoriteItem(SetFavoriteItemRequest $request): string
    {
        $favoriteItem = new FavoriteItemsDto(
            (int)$request->get('id'),
            $request->get('title'),
            $request->get('picture_url'),
            $request->get('type'),
        );

        $favoriteItems = session()->get('favorite_items') ?? [];

        if ($favoriteItems === []) {
            session()->push('favorite_items', $favoriteItem->toArray());
        }

        foreach ($favoriteItems as $item) {
            if ((int)$item['id'] === $favoriteItem->getId()) {
                break;
            }
            session()->push('favorite_items', $favoriteItem->toArray());
        }

        return view('partials.favorites', ['items' => session()->get('favorite_items') ?? []])->render();
    }

    public function sendFavoriteForm(SendFavoriteFormRequest $request): JsonResponse
    {
        $favoriteItems = session()->get('favorite_items');
        $phone = $request->get('name');
        $email = $request->get('email');
        $comment = $request->get('comment');

        if ($favoriteItems === null) {
            throw new RuntimeException('У вас нет избранных товаров.');
        }

        Mail::to(config('mail.from.address'))
            ->send(
                new SendFavoriteFormMail(
                    $favoriteItems,
                    $phone,
                    $email,
                    $comment
                )
            );

        session()->forget('favorite_items');

        return new JsonResponse('', 204);
    }
}
