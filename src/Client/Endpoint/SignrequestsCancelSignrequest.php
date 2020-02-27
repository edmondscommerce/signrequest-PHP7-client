<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\SignrequestsUuidCancelSignrequestPostResponse201;
use Symfony\Component\Serializer\SerializerInterface;

final class SignrequestsCancelSignrequest extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;
    protected string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{uuid}'], [$this->uuid], '/signrequests/{uuid}/cancel_signrequest/');
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
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?SignrequestsUuidCancelSignrequestPostResponse201
    {
        if ($status === 201 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\SignrequestsUuidCancelSignrequestPostResponse201', 'json');
        }
    }
}
