<?php

declare(strict_types=1);

namespace SignRequest;

use SignRequest\Client\Client;
use SignRequest\Client\Model\SignRequestQuickCreate;

final class QuickCreate
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function run(): SignRequestQuickCreate
    {
        $requestBody = $this->getRequestBody();
        $result      = $this->client->signrequestQuickCreateCreate();
        if ($result instanceof SignRequestQuickCreate) {
            return $result;
        }
    }

    private function getRequestBody(): SignRequestQuickCreate
    {
        $body = new SignRequestQuickCreate();

    }
}
