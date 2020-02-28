<?php declare(strict_types=1);

namespace SignRequest\Tests\Assets;

use SignRequest\Client\Client;
use Symfony\Component\HttpClient\HttpClient;

class TestClientFactory
{
    public static function create(): Client
    {
        return Client::create(
//            HttpClient::createForBaseUri(TestConfig::instance()->getConfig()->getBaseUri())
        );
    }
}
