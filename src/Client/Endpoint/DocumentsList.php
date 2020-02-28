<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

final class DocumentsList extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $external_id
     *     @var string $signrequest__who
     *     @var string $signrequest__from_email
     *     @var string $status
     *     @var string $user__email
     *     @var string $user__first_name
     *     @var string $user__last_name
     *     @var string $created
     *     @var string $modified
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
        return '/documents/';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['external_id', 'signrequest__who', 'signrequest__from_email', 'status', 'user__email', 'user__first_name', 'user__last_name', 'created', 'modified', 'page', 'limit']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('external_id', ['string']);
        $optionsResolver->setAllowedTypes('signrequest__who', ['string']);
        $optionsResolver->setAllowedTypes('signrequest__from_email', ['string']);
        $optionsResolver->setAllowedTypes('status', ['string']);
        $optionsResolver->setAllowedTypes('user__email', ['string']);
        $optionsResolver->setAllowedTypes('user__first_name', ['string']);
        $optionsResolver->setAllowedTypes('user__last_name', ['string']);
        $optionsResolver->setAllowedTypes('created', ['string']);
        $optionsResolver->setAllowedTypes('modified', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null): ?\SignRequest\Client\Model\DocumentsGetResponse200
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\DocumentsGetResponse200', 'json');
        }
    }
}
