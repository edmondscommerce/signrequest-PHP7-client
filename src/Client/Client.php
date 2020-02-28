<?php

declare(strict_types=1);

namespace SignRequest\Client;

final class Client extends \Jane\OpenApiRuntime\Client\Psr18Client
{
    /**
     * @param array $queryParameters {
     *
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\ApiTokensGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function apiTokensList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\ApiTokensList($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $document__uuid
     *     @var string $document__external_id
     *     @var string $created
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\DocumentAttachmentsGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentAttachmentsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentAttachmentsList($queryParameters), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\DocumentAttachment $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\DocumentAttachment|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentAttachmentsCreate(Model\DocumentAttachment $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentAttachmentsCreate($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\DocumentAttachment|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentAttachmentsRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentAttachmentsRead($uuid), $fetch);
    }

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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\DocumentsSearchGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentsSearchList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentsSearchList($queryParameters), $fetch);
    }

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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\DocumentsGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentsList($queryParameters), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\Document $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Document|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentsCreate(Model\Document $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentsCreate($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     */
    public function documentsDelete(string $uuid, string $fetch = self::FETCH_OBJECT): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentsDelete($uuid), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Document|\Psr\Http\Message\ResponseInterface|null
     */
    public function documentsRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\DocumentsRead($uuid), $fetch);
    }

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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\EventsGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function eventsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\EventsList($queryParameters), $fetch);
    }

    /**
     * @param int    $id    a unique integer value identifying this event
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Event|\Psr\Http\Message\ResponseInterface|null
     */
    public function eventsRead(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\EventsRead($id), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\SignRequestQuickCreate $requestBody
     * @param string                                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\SignRequestQuickCreate|\Psr\Http\Message\ResponseInterface|null
     */
    public function signrequestQuickCreateCreate(Model\SignRequestQuickCreate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\SignrequestQuickCreateCreate($requestBody), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $who
     *     @var string $from_email
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\SignrequestsGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function signrequestsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\SignrequestsList($queryParameters), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\SignRequest $requestBody
     * @param string                                $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\SignRequest|\Psr\Http\Message\ResponseInterface|null
     */
    public function signrequestsCreate(Model\SignRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\SignrequestsCreate($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\SignRequest|\Psr\Http\Message\ResponseInterface|null
     */
    public function signrequestsRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\SignrequestsRead($uuid), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\SignrequestsUuidCancelSignrequestPostResponse201|\Psr\Http\Message\ResponseInterface|null
     */
    public function signrequestsCancelSignrequest(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\SignrequestsCancelSignrequest($uuid), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\SignrequestsUuidResendSignrequestEmailPostResponse201|\Psr\Http\Message\ResponseInterface|null
     */
    public function signrequestsResendSignrequestEmail(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\SignrequestsResendSignrequestEmail($uuid), $fetch);
    }

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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\TeamMembersGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamMembersList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamMembersList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\TeamMember|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamMembersRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamMembersRead($uuid), $fetch);
    }

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
     * @param array $queryParameters {
     *
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\TeamsGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamsList($queryParameters), $fetch);
    }

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
     * @param \SignRequest\Client\Model\Team $requestBody
     * @param string                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Team|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamsCreate(Model\Team $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamsCreate($requestBody), $fetch);
    }

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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     */
    public function teamsDelete(string $subdomain, string $fetch = self::FETCH_OBJECT): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamsDelete($subdomain), $fetch);
    }

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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Team|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamsRead(string $subdomain, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamsRead($subdomain), $fetch);
    }

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
     * @param \SignRequest\Client\Model\Team $requestBody
     * @param string                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Team|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamsPartialUpdate(string $subdomain, Model\Team $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamsPartialUpdate($subdomain, $requestBody), $fetch);
    }

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
     * @param \SignRequest\Client\Model\InviteMember $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\InviteMember|\Psr\Http\Message\ResponseInterface|null
     */
    public function teamsInviteMember(string $subdomain, Model\InviteMember $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TeamsInviteMember($subdomain, $requestBody), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\TemplatesGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function templatesList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TemplatesList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\Template|\Psr\Http\Message\ResponseInterface|null
     */
    public function templatesRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\TemplatesRead($uuid), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\WebhooksGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function webhooksList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\WebhooksList($queryParameters), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\WebhookSubscription $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\WebhookSubscription|\Psr\Http\Message\ResponseInterface|null
     */
    public function webhooksCreate(Model\WebhookSubscription $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\WebhooksCreate($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     */
    public function webhooksDelete(string $uuid, string $fetch = self::FETCH_OBJECT): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\WebhooksDelete($uuid), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\WebhookSubscription|\Psr\Http\Message\ResponseInterface|null
     */
    public function webhooksRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\WebhooksRead($uuid), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\WebhookSubscription $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\WebhookSubscription|\Psr\Http\Message\ResponseInterface|null
     */
    public function webhooksPartialUpdate(string $uuid, Model\WebhookSubscription $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\WebhooksPartialUpdate($uuid, $requestBody), $fetch);
    }

    /**
     * @param \SignRequest\Client\Model\WebhookSubscription $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \SignRequest\Client\Model\WebhookSubscription|\Psr\Http\Message\ResponseInterface|null
     */
    public function webhooksUpdate(string $uuid, Model\WebhookSubscription $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \SignRequest\Client\Endpoint\WebhooksUpdate($uuid, $requestBody), $fetch);
    }

    public static function create($httpClient = null, \Jane\OpenApiRuntime\Client\Authentication $authentication = null)
    {
        if ($httpClient === null) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins    = [];
            $uri        = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://signrequest.com/api/v1');
            $plugins[]  = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[]  = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if ($authentication !== null) {
                $plugins[] = $authentication->getPlugin();
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory  = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer     = new \Symfony\Component\Serializer\Serializer([new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \SignRequest\Client\Normalizer\JaneObjectNormalizer()], [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode())]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
