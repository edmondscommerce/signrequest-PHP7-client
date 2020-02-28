<?php

declare(strict_types=1);

namespace SignRequest\Config;

final class Config
{
    private string $apiToken;
    private string $subdomain;

    public function __construct(string $apiToken, string $subdomain)
    {
        $this->apiToken  = $apiToken;
        $this->subdomain = $subdomain;
    }

    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    public function getBaseUri(): string
    {
        return 'https://' . $this->getSubdomain() . '.signrequest.com/api/v1/';
    }

    public function getSubdomain(): string
    {
        return $this->subdomain;
    }
}
