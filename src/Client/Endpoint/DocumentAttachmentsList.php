<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\DocumentAttachmentsGetResponse200;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

final class DocumentAttachmentsList extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $document__uuid
     *     @var string $document__external_id
     *     @var string $created
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
        return '/document-attachments/';
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
        $optionsResolver->setDefined(['document__uuid', 'document__external_id', 'created', 'page', 'limit']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('document__uuid', ['string']);
        $optionsResolver->setAllowedTypes('document__external_id', ['string']);
        $optionsResolver->setAllowedTypes('created', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?DocumentAttachmentsGetResponse200
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\DocumentAttachmentsGetResponse200', 'json');
        }
    }
}
