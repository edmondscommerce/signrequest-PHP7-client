<?php declare(strict_types=1);

namespace SignRequest\Tests\Assets;

use SignRequest\Client\Client;
use Symfony\Component\HttpClient\HttpClient;

class ClientFactory
{
    public function create(): Client
    {
        $client = new Client(
            HttpClient::createForBaseUri()
        )
    }
}
