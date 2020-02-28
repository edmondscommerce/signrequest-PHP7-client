<?php

declare(strict_types=1);

namespace SignRequest\Config;

use InvalidArgumentException;
use function array_key_exists;
use function implode;

final class ConfigFactory
{
    public const KEY_TOKEN     = 'signrequest_token';
    public const KEY_SUBDOMAIN = 'signrequest_subdomain';
    public const KEYS          = [
        self::KEY_TOKEN,
        self::KEY_SUBDOMAIN,
    ];

    public static function createConfigFromServer(): Config
    {
        return self::createConfigFromArray($_SERVER);
    }

    public static function createConfigFromArray(array $data): Config
    {
        self::assertArrayHasKeys($data);

        return new Config(
            $data[self::KEY_TOKEN],
            $data[self::KEY_SUBDOMAIN]
        );
    }

    public static function assertArrayHasKeys(array $data, array $keys = self::KEYS): void
    {
        $missing = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $data) === false) {
                $missing[] = $key;
            }
        }
        if ([] === $missing) {
            return;
        }
        throw new InvalidArgumentException('Missing configuration keys: ' . implode(', ', $missing));
    }
}
