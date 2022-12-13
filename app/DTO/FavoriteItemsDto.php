<?php

declare(strict_types=1);

namespace App\DTO;

final class FavoriteItemsDto
{
    public function __construct(
      private int $id,
      private string $title,
      private string $pictureUrl,
      private string $type,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPictureUrl(): string
    {
        return $this->pictureUrl;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'picture_url' => $this->pictureUrl,
        ];
    }
}
