<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\TeamMembersGetResponse200;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

final class TeamMembersList extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $is_active
     *     @var string $is_owner
     *     @var string $is_admin
     *     @var string $user__email
     *     @var string $user__first_name
     *     @var string $user__last_name
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/team-members/';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['is_active', 'is_owner', 'is_admin', 'user__email', 'user__first_name', 'user__last_name', 'page', 'limit']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('is_active', ['string']);
        $optionsResolver->setAllowedTypes('is_owner', ['string']);
        $optionsResolver->setAllowedTypes('is_admin', ['string']);
        $optionsResolver->setAllowedTypes('user__email', ['string']);
        $optionsResolver->setAllowedTypes('user__first_name', ['string']);
        $optionsResolver->setAllowedTypes('user__last_name', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?TeamMembersGetResponse200
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\TeamMembersGetResponse200', 'json');
        }
    }
}
