<?php declare(strict_types=1);

namespace SignRequest\Config;

class Config
{
    private string $apiToken;
    private string $subdomain;

    /**
     * @param string $apiToken
     * @param string $subdomain
     */
    public function __construct(string $apiToken, string $subdomain)
    {
        $this->apiToken  = $apiToken;
        $this->subdomain = $subdomain;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    public function getBaseUri(): string
    {
        return 'https://' . $this->getSubdomain() . '.signrequest.com/api/v1/';
    }

    /**
     * @return string
     */
    public function getSubdomain(): string
    {
        return $this->subdomain;
    }
}
