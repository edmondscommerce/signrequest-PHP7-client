<?php declare(strict_types=1);

namespace SignRequest;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication;
use Psr\Http\Message\RequestInterface;
use SignRequest\Client\Client;
use SignRequest\Config\Config;

class ClientFactory
{
    public static function create(Config $config): Client
    {
        return Client::create(self::getClient($config));
    }

    private static function getClient(Config $config)
    {
        $httpClient = Psr18ClientDiscovery::find();
        $plugins    = [];
        $uri        = Psr17FactoryDiscovery::findUrlFactory()->createUri(self::getApiDomain($config));
        $plugins[]  = new AddHostPlugin($uri);
        $plugins[]  = new AddPathPlugin($uri);
        $plugins[]  = self::getApiKeyAuthPlugin($config);
        $httpClient = new PluginClient($httpClient, $plugins);

        return $httpClient;
    }

    private static function getApiDomain(Config $config): string
    {
        return 'https://' . $config->getSubdomain() . '.signrequest.com/api/v1/';
    }

    private static function getApiKeyAuthPlugin(Config $config): AuthenticationPlugin
    {
        return new AuthenticationPlugin(
            new class($config->getApiToken()) implements Authentication {
                private string $apiKey;

                public function __construct(string $apiKey)
                {
                    $this->apiKey = $apiKey;
                }

                /**
                 * @param RequestInterface $request
                 *
                 * @return RequestInterface
                 */
                public function authenticate(RequestInterface $request): RequestInterface
                {
                    return $request->withHeader('Authorization', 'Token ' . $this->apiKey);
                }
            }
        );
    }
}
