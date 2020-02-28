<?php

declare(strict_types=1);

use SignRequest\Tests\Assets\TestConfig;
use Symfony\Component\Dotenv\Dotenv;

(static function (): void {
    $envPath = __DIR__ . '/../.env.test';
    if (isset($_SERVER[TestConfig::KEY_SIGNER_1_EMAIL]) === false) {
        if (file_exists($envPath) === false) {
            throw new RuntimeException('Required env keys not exported to $_SERVER and there is no .env.test file to load them from ');
        }
        (new Dotenv())->load($envPath);
    }
})();
