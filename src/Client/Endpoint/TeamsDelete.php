<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

final class TeamsDelete extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;
    protected string $subdomain;

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
     * @param string $subdomain
     */
    public function __construct(string $subdomain)
    {
        $this->subdomain = $subdomain;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{subdomain}'], [$this->subdomain], '/teams/{subdomain}/');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null)
    {
        if ($status === 204) {
            return null;
        }
    }
}
