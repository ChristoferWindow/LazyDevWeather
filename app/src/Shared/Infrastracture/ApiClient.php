<?php

declare(strict_types=1);

use Psr\Http\Client\ClientInterface;

interface ApiClient
{
    public function __construct(ClientInterface $client);

    public function search(string $url, array $params): array;
}
