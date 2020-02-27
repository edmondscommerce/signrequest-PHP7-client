<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\SignrequestsGetResponse200;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

final class SignrequestsList extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $who
     *     @var string $from_email
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
        return '/signrequests/';
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
        $optionsResolver->setDefined(['who', 'from_email', 'page', 'limit']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('who', ['string']);
        $optionsResolver->setAllowedTypes('from_email', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?SignrequestsGetResponse200
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\SignrequestsGetResponse200', 'json');
        }
    }
}
