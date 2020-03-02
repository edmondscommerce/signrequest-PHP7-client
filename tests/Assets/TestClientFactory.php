<?php

declare(strict_types=1);

namespace SignRequest\Tests\Assets;

use SignRequest\Client\Client;
use SignRequest\ClientFactory;

final class TestClientFactory
{
    public static function create(): Client
    {
        return ClientFactory::create(TestConfig::instance()->getConfig());
    }
}
