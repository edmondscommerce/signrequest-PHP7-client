<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\Template;
use Symfony\Component\Serializer\SerializerInterface;

final class TemplatesRead extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;
    protected string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{uuid}'], [$this->uuid], '/templates/{uuid}/');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?Template
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\Template', 'json');
        }
    }
}
