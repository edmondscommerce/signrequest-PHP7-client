<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\InviteMember;
use Symfony\Component\Serializer\SerializerInterface;

final class TeamsInviteMember extends BaseEndpoint implements Psr7Endpoint
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
     * @param string       $subdomain
     * @param InviteMember $requestBody
     */
    public function __construct(string $subdomain, InviteMember $requestBody)
    {
        $this->subdomain = $subdomain;
        $this->body      = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{subdomain}'], [$this->subdomain], '/teams/{subdomain}/invite_member/');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof InviteMember) {
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
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?InviteMember
    {
        if ($status === 201 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\InviteMember', 'json');
        }
    }
}
