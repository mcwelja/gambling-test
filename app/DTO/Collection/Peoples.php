<?php

namespace App\DTO\Collection;

use App\DTO\People;
use JsonSerializable;

class Peoples implements JsonSerializable
{
    public readonly array $peoples;

    public function __construct(People ...$peoples)
    {
        $this->peoples = $peoples;
    }

    public function jsonSerialize(): array
    {
        return $this->peoples;
    }
}
