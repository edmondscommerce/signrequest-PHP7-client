<?php declare(strict_types=1);

namespace SignRequest\Tests\Small\Config;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SignRequest\Config\ConfigFactory;

/**
 * @covers \SignRequest\Config\ConfigFactory
 * @covers \SignRequest\Config\Config
 */
class ConfigFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBuildFromArray(): void
    {
        $data   = [
            ConfigFactory::KEY_SUBDOMAIN => 'foo',
            ConfigFactory::KEY_TOKEN     => 'bar',
        ];
        $actual = ConfigFactory::createConfigFromArray($data);
        self::assertSame($actual->getApiToken(), $data[ConfigFactory::KEY_TOKEN]);
        self::assertSame($actual->getSubdomain(), $data[ConfigFactory::KEY_SUBDOMAIN]);
    }

    /**
     * @test
     */
    public function itWillExceptIfDataMissing(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing configuration keys: signrequest_token');
        $data   = [
            ConfigFactory::KEY_SUBDOMAIN => 'foo',
        ];
        $actual = ConfigFactory::createConfigFromArray($data);

    }
}
