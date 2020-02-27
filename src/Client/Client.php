<?php

declare(strict_types=1);

namespace SignRequest\Client;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Jane\OpenApiRuntime\Client\Authentication;
use Jane\OpenApiRuntime\Client\Psr18Client;
use Psr\Http\Message\ResponseInterface;
use SignRequest\Client\Endpoint\ApiTokensList;
use SignRequest\Client\Endpoint\DocumentAttachmentsCreate;
use SignRequest\Client\Endpoint\DocumentAttachmentsList;
use SignRequest\Client\Endpoint\DocumentAttachmentsRead;
use SignRequest\Client\Endpoint\DocumentsCreate;
use SignRequest\Client\Endpoint\DocumentsDelete;
use SignRequest\Client\Endpoint\DocumentsList;
use SignRequest\Client\Endpoint\DocumentsRead;
use SignRequest\Client\Endpoint\DocumentsSearchList;
use SignRequest\Client\Endpoint\EventsList;
use SignRequest\Client\Endpoint\EventsRead;
use SignRequest\Client\Endpoint\SignrequestQuickCreateCreate;
use SignRequest\Client\Endpoint\SignrequestsCancelSignrequest;
use SignRequest\Client\Endpoint\SignrequestsCreate;
use SignRequest\Client\Endpoint\SignrequestsList;
use SignRequest\Client\Endpoint\SignrequestsRead;
use SignRequest\Client\Endpoint\SignrequestsResendSignrequestEmail;
use SignRequest\Client\Endpoint\TeamMembersList;
use SignRequest\Client\Endpoint\TeamMembersRead;
use SignRequest\Client\Endpoint\TeamsCreate;
use SignRequest\Client\Endpoint\TeamsDelete;
use SignRequest\Client\Endpoint\TeamsInviteMember;
use SignRequest\Client\Endpoint\TeamsList;
use SignRequest\Client\Endpoint\TeamsPartialUpdate;
use SignRequest\Client\Endpoint\TeamsRead;
use SignRequest\Client\Endpoint\TemplatesList;
use SignRequest\Client\Endpoint\TemplatesRead;
use SignRequest\Client\Endpoint\WebhooksCreate;
use SignRequest\Client\Endpoint\WebhooksDelete;
use SignRequest\Client\Endpoint\WebhooksList;
use SignRequest\Client\Endpoint\WebhooksPartialUpdate;
use SignRequest\Client\Endpoint\WebhooksRead;
use SignRequest\Client\Endpoint\WebhooksUpdate;
use SignRequest\Client\Model\ApiTokensGetResponse200;
use SignRequest\Client\Model\Document;
use SignRequest\Client\Model\DocumentAttachment;
use SignRequest\Client\Model\DocumentAttachmentsGetResponse200;
use SignRequest\Client\Model\DocumentsGetResponse200;
use SignRequest\Client\Model\DocumentsSearchGetResponse200;
use SignRequest\Client\Model\Event;
use SignRequest\Client\Model\EventsGetResponse200;
use SignRequest\Client\Model\InviteMember;
use SignRequest\Client\Model\SignRequest;
use SignRequest\Client\Model\SignRequestQuickCreate;
use SignRequest\Client\Model\SignrequestsGetResponse200;
use SignRequest\Client\Model\SignrequestsUuidCancelSignrequestPostResponse201;
use SignRequest\Client\Model\SignrequestsUuidResendSignrequestEmailPostResponse201;
use SignRequest\Client\Model\Team;
use SignRequest\Client\Model\TeamMember;
use SignRequest\Client\Model\TeamMembersGetResponse200;
use SignRequest\Client\Model\TeamsGetResponse200;
use SignRequest\Client\Model\Template;
use SignRequest\Client\Model\TemplatesGetResponse200;
use SignRequest\Client\Model\WebhooksGetResponse200;
use SignRequest\Client\Model\WebhookSubscription;
use SignRequest\Client\Normalizer\JaneObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer;

final class Client extends Psr18Client
{
    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ApiTokensGetResponse200|ResponseInterface|null
     *@var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     */
    public function apiTokensList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new ApiTokensList($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return DocumentAttachmentsGetResponse200|ResponseInterface|null
     *@var string $created
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @var string $document__uuid
     *     @var string $document__external_id
     */
    public function documentAttachmentsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentAttachmentsList($queryParameters), $fetch);
    }

    /**
     * @param DocumentAttachment $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return DocumentAttachment|ResponseInterface|null
     */
    public function documentAttachmentsCreate(Model\DocumentAttachment $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentAttachmentsCreate($requestBody), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return DocumentAttachment|ResponseInterface|null
     */
    public function documentAttachmentsRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentAttachmentsRead($uuid), $fetch);
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
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return DocumentsSearchGetResponse200|ResponseInterface|null
     *@var int $page a page number within the paginated result set
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
     */
    public function documentsSearchList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentsSearchList($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return DocumentsGetResponse200|ResponseInterface|null
     *@var string $external_id
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
     */
    public function documentsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentsList($queryParameters), $fetch);
    }

    /**
     * @param Document $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     */
    public function documentsCreate(Model\Document $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentsCreate($requestBody), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     */
    public function documentsDelete(string $uuid, string $fetch = self::FETCH_OBJECT): ?ResponseInterface
    {
        return $this->executePsr7Endpoint(new DocumentsDelete($uuid), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Document|ResponseInterface|null
     */
    public function documentsRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new DocumentsRead($uuid), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return EventsGetResponse200|ResponseInterface|null
     *@var string $document__uuid
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
     */
    public function eventsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new EventsList($queryParameters), $fetch);
    }

    /**
     * @param int    $id    a unique integer value identifying this event
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Event|ResponseInterface|null
     */
    public function eventsRead(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new EventsRead($id), $fetch);
    }

    /**
     * @param SignRequestQuickCreate $requestBody
     * @param string                                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return SignRequestQuickCreate|ResponseInterface|null
     */
    public function signrequestQuickCreateCreate(Model\SignRequestQuickCreate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SignrequestQuickCreateCreate($requestBody), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return SignrequestsGetResponse200|ResponseInterface|null
     *@var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     * @var string $who
     *     @var string $from_email
     */
    public function signrequestsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SignrequestsList($queryParameters), $fetch);
    }

    /**
     * @param SignRequest $requestBody
     * @param string                                $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return SignRequest|ResponseInterface|null
     */
    public function signrequestsCreate(Model\SignRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SignrequestsCreate($requestBody), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return SignRequest|ResponseInterface|null
     */
    public function signrequestsRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SignrequestsRead($uuid), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return SignrequestsUuidCancelSignrequestPostResponse201|ResponseInterface|null
     */
    public function signrequestsCancelSignrequest(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SignrequestsCancelSignrequest($uuid), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return SignrequestsUuidResendSignrequestEmailPostResponse201|ResponseInterface|null
     */
    public function signrequestsResendSignrequestEmail(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SignrequestsResendSignrequestEmail($uuid), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return TeamMembersGetResponse200|ResponseInterface|null
     *@var string $is_active
     *     @var string $is_owner
     *     @var string $is_admin
     *     @var string $user__email
     *     @var string $user__first_name
     *     @var string $user__last_name
     *     @var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     */
    public function teamMembersList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamMembersList($queryParameters), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return TeamMember|ResponseInterface|null
     */
    public function teamMembersRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamMembersRead($uuid), $fetch);
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
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return TeamsGetResponse200|ResponseInterface|null
     *@var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     */
    public function teamsList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamsList($queryParameters), $fetch);
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
     * @param Team $requestBody
     * @param string                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Team|ResponseInterface|null
     */
    public function teamsCreate(Model\Team $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamsCreate($requestBody), $fetch);
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
     * @param string $subdomain
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     */
    public function teamsDelete(string $subdomain, string $fetch = self::FETCH_OBJECT): ?ResponseInterface
    {
        return $this->executePsr7Endpoint(new TeamsDelete($subdomain), $fetch);
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
     * @param string $subdomain
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Team|ResponseInterface|null
     */
    public function teamsRead(string $subdomain, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamsRead($subdomain), $fetch);
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
     * @param string $subdomain
     * @param Team   $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Team|ResponseInterface|null
     */
    public function teamsPartialUpdate(string $subdomain, Model\Team $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamsPartialUpdate($subdomain, $requestBody), $fetch);
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
     * @param string       $subdomain
     * @param InviteMember $requestBody
     * @param string       $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return InviteMember|ResponseInterface|null
     */
    public function teamsInviteMember(string $subdomain, Model\InviteMember $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TeamsInviteMember($subdomain, $requestBody), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return TemplatesGetResponse200|ResponseInterface|null
     *@var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     */
    public function templatesList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TemplatesList($queryParameters), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return Template|ResponseInterface|null
     */
    public function templatesRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new TemplatesRead($uuid), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhooksGetResponse200|ResponseInterface|null
     *@var int $page a page number within the paginated result set
     *     @var int $limit Number of results to return per page.
     * }
     *
     */
    public function webhooksList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new WebhooksList($queryParameters), $fetch);
    }

    /**
     * @param WebhookSubscription $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     */
    public function webhooksCreate(Model\WebhookSubscription $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new WebhooksCreate($requestBody), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ResponseInterface|null
     */
    public function webhooksDelete(string $uuid, string $fetch = self::FETCH_OBJECT): ?ResponseInterface
    {
        return $this->executePsr7Endpoint(new WebhooksDelete($uuid), $fetch);
    }

    /**
     * @param string $uuid
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     */
    public function webhooksRead(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new WebhooksRead($uuid), $fetch);
    }

    /**
     * @param string              $uuid
     * @param WebhookSubscription $requestBody
     * @param string              $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     */
    public function webhooksPartialUpdate(string $uuid, Model\WebhookSubscription $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new WebhooksPartialUpdate($uuid, $requestBody), $fetch);
    }

    /**
     * @param string              $uuid
     * @param WebhookSubscription $requestBody
     * @param string              $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return WebhookSubscription|ResponseInterface|null
     */
    public function webhooksUpdate(string $uuid, Model\WebhookSubscription $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new WebhooksUpdate($uuid, $requestBody), $fetch);
    }

    public static function create($httpClient = null, Authentication $authentication = null): Client
    {
        if ($httpClient === null) {
            $httpClient = Psr18ClientDiscovery::find();
            $plugins    = [];
            $uri        = Psr17FactoryDiscovery::findUrlFactory()->createUri('https://signrequest.com/api/v1');
            $plugins[]  = new AddHostPlugin($uri);
            $plugins[]  = new AddPathPlugin($uri);
            if ($authentication !== null) {
                $plugins[] = $authentication->getPlugin();
            }
            $httpClient = new PluginClient($httpClient, $plugins);
        }
        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory  = Psr17FactoryDiscovery::findStreamFactory();
        $serializer     = new Serializer([new ArrayDenormalizer(), new JaneObjectNormalizer()], [new JsonEncoder(new JsonEncode(), new JsonDecode())]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
