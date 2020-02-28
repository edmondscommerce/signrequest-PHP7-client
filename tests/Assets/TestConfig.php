<?php

declare(strict_types=1);

namespace SignRequest\Tests\Assets;

use SignRequest\Client\Model\Signer;
use SignRequest\Config\Config;
use SignRequest\Config\ConfigFactory;
use function array_merge;

final class TestConfig
{
    public const KEY_SIGNER_1_EMAIL = 'signer1_email';
    public const KEY_SIGNER_2_EMAIL = 'signer2_email';
    public const KEYS               = [
        self::KEY_SIGNER_1_EMAIL,
        self::KEY_SIGNER_2_EMAIL,
    ];
    private static $instance;

    private Config $config;
    private Signer $testSigner1;
    private Signer $testSigner2;

    public function __construct(Config $config, Signer $testSigner1, Signer $testSigner2)
    {
        $this->config      = $config;
        $this->testSigner1 = $testSigner1;
        $this->testSigner2 = $testSigner2;
    }

    public static function instance(): self
    {
        if ((self::$instance instanceof self) === false) {
            self::$instance = self::createFromServer();
        }

        return self::$instance;
    }

    public static function createFromServer(): self
    {
        ConfigFactory::assertArrayHasKeys($_SERVER, array_merge(ConfigFactory::KEYS, self::KEYS));
        $config  = ConfigFactory::createConfigFromServer();
        $signer1 = self::createSigner($_SERVER[self::KEY_SIGNER_1_EMAIL]);
        $signer2 = self::createSigner($_SERVER[self::KEY_SIGNER_2_EMAIL]);

        return new self($config, $signer1, $signer2);
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function getTestSigner1(): Signer
    {
        return $this->testSigner1;
    }

    public function getTestSigner2(): Signer
    {
        return $this->testSigner2;
    }

    private static function createSigner(string $emailAddress): Signer
    {
        $signer = new Signer();
        $signer->setEmail($emailAddress);

        return $signer;
    }
}
