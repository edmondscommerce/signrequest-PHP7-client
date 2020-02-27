<?php

declare(strict_types=1);

namespace SignRequest\Client\Authentication;

use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Message\Authentication;
use Psr\Http\Message\RequestInterface;

final class TokenAuthentication implements \Jane\OpenApiRuntime\Client\Authentication
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->{'apiKey'} = $apiKey;
    }

    public function getPlugin(): Plugin
    {
        return new AuthenticationPlugin(new class($this->{'apiKey'}) implements Authentication {
            private $apiKey;

            public function __construct(string $apiKey)
            {
                $this->{'apiKey'} = $apiKey;
            }

            public function authenticate(RequestInterface $request): RequestInterface
            {
                return $request->withHeader('Authorization', $this->{'apiKey'});
            }
        });
    }
}
