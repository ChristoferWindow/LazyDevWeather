<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

interface ApiClient
{
    public function search(string $url, array $params): array;
}
