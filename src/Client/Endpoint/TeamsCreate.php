<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\Team;
use Symfony\Component\Serializer\SerializerInterface;

final class TeamsCreate extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;

    /**
     * Required fields are **name** and **subdomain** where the subdomain is globally unique.
     * Use **POST** to create a Team.
     * To update a field on a Team use **PATCH**.
     * To use the API on behalf of a particular team change the endpoint to:
     *https://{{ subdomain }}.signrequest.com/api/v1/...*
     *
     * To invite new team members you can use **POST**
     * {"email":"**email-of-member-to-invite@example.com**","is_admin":false,"is_owner":false} to:
     *https://signrequest.com/api/v1/teams/{{ subdomain }}/invite_member/*
     *
     * @param Team $requestBody
     */
    public function __construct(Team $requestBody)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/teams/';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof Team) {
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
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?Team
    {
        if ($status === 201 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\Team', 'json');
        }
    }
}
