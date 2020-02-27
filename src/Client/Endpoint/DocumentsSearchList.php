<?php

declare(strict_types=1);

namespace SignRequest\Client\Endpoint;

use Jane\OpenApiRuntime\Client\BaseEndpoint;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;
use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
use SignRequest\Client\Model\DocumentsSearchGetResponse200;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

final class DocumentsSearchList extends BaseEndpoint implements Psr7Endpoint
{
    use Psr7EndpointTrait;

    /**
     * Search interface for fast (autocomplete) searching of documents.
     *
     *Normal search:*
     *
     * - ?**q**={{query}}
     *
     *Autocomplete search:*
     *
     * - ?**autocomplete**={{partial query}}
     *
     *Search in document name:*
     *
     * - ?**name**={{query}}
     *
     *Available (extra) filters:*
     *
     * - ?**subdomain**={{ team_subdomain }} or use this endpoint with team_subdomain.signrequest.com
     * (when not provided only personal documents are shown)
     * - ?**signer_emails**={{ signer@email.com }} (will filter documents that an email needed to sign/approve)
     * - ?**status**={{ si }}
     * - ?**who**={{ mo }}
     *
     * To include multiple values for a filter field separate the values with a pipe (|).
     * For example to only search for completed documents use **status=se|vi** (sent and viewed).
     *
     *Pagination:*
     *
     * - ?**page**={{ page_number: default 1 }}
     * - ?**limit**={{ limit results: default 10, max 100 }}
     *
     *Format:*
     *
     * By default json is returned, to export data as csv or xls use the format parameter.
     *
     * - ?**format**=csv
     * - ?**format**=xls
     *
     * For csv and xls the data can also be exported with each signer on a separate row. In this mode also the signer
     * inputs that have an *external_id* specified on a tag will be exported. All external_id's found will be exported as
     * columns. To use this mode add the **signer_data** parameter.
     *
     * - ?**format**=csv&**signer_data**=1
     * - ?**format**=xls&**signer_data**=1
     *
     * Note that all documents are only ordered by **created** (newest first) when **q**, **autocomplete** or **name** are
     *
     * @param array $queryParameters {
     *
     *     @var int $page a page number within the paginated result set
     *     @var int $limit number of results to return per page
     *     @var string $q Normal search query
     *     @var string $autocomplete Partial search query
     *     @var string $name Document name
     *     @var string $subdomain
     *     @var string $signer_emails Email needed to sign/approve
     *     @var string $status `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired
     *     @var string $who `m`: only me, `mo`: me and others, `o`: only others
     *     @var string $format Export format, can be `json` (default), `csv`, or `xls`
     *     @var float $signer_data Set to `1` to export with each signer on a separate row
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
        return '/documents-search/';
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
        $optionsResolver->setDefined(['page', 'limit', 'q', 'autocomplete', 'name', 'subdomain', 'signer_emails', 'status', 'who', 'format', 'signer_data']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);
        $optionsResolver->setAllowedTypes('q', ['string']);
        $optionsResolver->setAllowedTypes('autocomplete', ['string']);
        $optionsResolver->setAllowedTypes('name', ['string']);
        $optionsResolver->setAllowedTypes('subdomain', ['string']);
        $optionsResolver->setAllowedTypes('signer_emails', ['string']);
        $optionsResolver->setAllowedTypes('status', ['string']);
        $optionsResolver->setAllowedTypes('who', ['string']);
        $optionsResolver->setAllowedTypes('format', ['string']);
        $optionsResolver->setAllowedTypes('signer_data', ['float']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null): ?DocumentsSearchGetResponse200
    {
        if ($status === 200 && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'SignRequest\\Client\\Model\\DocumentsSearchGetResponse200', 'json');
        }
    }
}
