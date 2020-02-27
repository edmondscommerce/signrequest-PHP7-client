<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\WebhookSubscription;
use Symfony\Component\Serializer\SerializerInterface;

final class WebhooksPartialUpdate extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;
    protected string $uuid;

    public function __construct(string $uuid, WebhookSubscription $requestBody)
    {
        $this->uuid = $uuid;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{uuid}'], [$this->uuid], '/webhooks/{uuid}/');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof WebhookSubscription) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?WebhookSubscription
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\WebhookSubscription', 'json');
        }
    }
}
