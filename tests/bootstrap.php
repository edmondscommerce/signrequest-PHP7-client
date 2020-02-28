<?php declare(strict_types=1);

use SignRequest\Tests\Assets\TestConfig;
use Symfony\Component\Dotenv\Dotenv;

(static function () {
    $envPath = __DIR__ . '/../.env.test';
    if (false === isset($_SERVER[TestConfig::KEY_SIGNER_1_EMAIL])) {
        if (false === file_exists($envPath)) {
            throw new \RuntimeException('Required env keys not exported to $_SERVER and there is no .env.test file to load them from ');
        }
        (new Dotenv())->load($envPath);
    }
})();