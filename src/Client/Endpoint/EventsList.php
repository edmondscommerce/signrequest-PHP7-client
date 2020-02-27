<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\EventsGetResponse200;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

final class EventsList extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $document__uuid
     *     @var string $document__external_id
     *     @var string $document__signrequest__who
     *     @var string $document__signrequest__from_email
     *     @var string $document__status
     *     @var string $document__user__email
     *     @var string $document__user__first_name
     *     @var string $document__user__last_name
     *     @var string $delivered
     *     @var string $delivered_on
     *     @var string $timestamp
     *     @var string $status
     *     @var string $event_type
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
        return '/events/';
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
        $optionsResolver->setDefined(['document__uuid', 'document__external_id', 'document__signrequest__who', 'document__signrequest__from_email', 'document__status', 'document__user__email', 'document__user__first_name', 'document__user__last_name', 'delivered', 'delivered_on', 'timestamp', 'status', 'event_type', 'page', 'limit']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('document__uuid', ['string']);
        $optionsResolver->setAllowedTypes('document__external_id', ['string']);
        $optionsResolver->setAllowedTypes('document__signrequest__who', ['string']);
        $optionsResolver->setAllowedTypes('document__signrequest__from_email', ['string']);
        $optionsResolver->setAllowedTypes('document__status', ['string']);
        $optionsResolver->setAllowedTypes('document__user__email', ['string']);
        $optionsResolver->setAllowedTypes('document__user__first_name', ['string']);
        $optionsResolver->setAllowedTypes('document__user__last_name', ['string']);
        $optionsResolver->setAllowedTypes('delivered', ['string']);
        $optionsResolver->setAllowedTypes('delivered_on', ['string']);
        $optionsResolver->setAllowedTypes('timestamp', ['string']);
        $optionsResolver->setAllowedTypes('status', ['string']);
        $optionsResolver->setAllowedTypes('event_type', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?EventsGetResponse200
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\EventsGetResponse200', 'json');
        }
    }
}
