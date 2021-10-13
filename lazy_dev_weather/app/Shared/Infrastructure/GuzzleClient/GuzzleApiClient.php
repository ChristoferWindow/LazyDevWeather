<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\GuzzleClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Shared\Infrastructure\ApiClient;

final class GuzzleApiClient implements ApiClient
{
    public function __construct(private Client $client)
    {
    }

    public function search(string $url, array $params): array
    {
        return json_decode(
            $this->getClient()
                ->request('GET', $url, ['query' => $params])
                ->getBody()
                ->getContents(), true
        );
    }

    public function getClient(): Client
    {
        return $this->client;
    }
}
