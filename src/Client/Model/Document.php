<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class Document
{
    /**
     * @var string|null
     */
    protected $url;
    /**
     * @var DocumentTeam|null
     */
    protected $team;
    /**
     * @var string|null
     */
    protected $uuid;
    /**
     * @var User|null
     */
    protected $user;
    /**
     * Temporary URL to original file as PDF, expires in five minutes.
     *
     * @var string|null
     */
    protected $fileAsPdf;
    /**
     * Defaults to filename, including extension.
     *
     * @var string|null
     */
    protected $name;
    /**
     * ID used to reference document in external system.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Shared secret used in conjunction with <a href="#section/Frontend-API/SignRequest-js-client-(beta)">SignRequest-js client</a> to grant user access to a document that's not a member of the document's team.
     *
     * @var string|null
     */
    protected $frontendId;
    /**
     * Temporary URL to original file, expires in five minutes.
     *
     * @var string|null
     */
    protected $file;
    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     *
     * @var string|null
     */
    protected $fileFromUrl;
    /**
     * URL at which to receive [event callbacks](#section/Events/Events-callback) for this document.
     *
     * @var string|null
     */
    protected $eventsCallbackUrl;
    /**
     * Base64 encoded document content.
     *
     * @var string|null
     */
    protected $fileFromContent;
    /**
     * Filename, including extension. Required when using `file_from_content`.
     *
     * @var string|null
     */
    protected $fileFromContentName;
    /**
     * @var string|null
     */
    protected $template;
    /**
     * Prefill signer input data, see [prefill tags](#section/Preparing-a-document/Prefill-tags-templates).
     *
     * @var InlinePrefillTags[]|null
     */
    protected $prefillTags = [];
    /**
     * @var InlineIntegrationData[]|null
     */
    protected $integrations = [];
    /**
     * @var FileFromSf|null
     */
    protected $fileFromSf;
    /**
     * Number of days after which a finished document (signed/cancelled/declined) will be automatically deleted.
     *
     * @var int|null
     */
    protected $autoDeleteDays;
    /**
     * Number of days after which a non finished document will be automatically expired.
     *
     * @var int|null
     */
    protected $autoExpireDays;
    /**
     * Temporary URL to signed document as PDF, expires in five minutes.
     *
     * @var string|null
     */
    protected $pdf;
    /**
     * `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired.
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var DocumentSignrequest|null
     */
    protected $signrequest;
    /**
     * Indicates whether document was created using the API.
     *
     * @var bool|null
     */
    protected $apiUsed;
    /**
     * @var DocumentSigningLog|null
     */
    protected $signingLog;
    /**
     * SHA256 hash of PDF contents.
     *
     * @var string|null
     */
    protected $securityHash;
    /**
     * @var DocumentAttachment[]|null
     */
    protected $attachments = [];
    /**
     * Date and time calculated using `auto_delete_days` after which a finished document (signed/cancelled/declined) will be automatically deleted.
     *
     * @var DateTime|null
     */
    protected $autoDeleteAfter;
    /**
     * Indicates whether document was created as part of a sandbox team.
     *
     * @var bool|null
     */
    protected $sandbox;
    /**
     * Date and time calculated using `auto_expire_days` after which a non finished document will be automatically expired.
     *
     * @var DateTime|null
     */
    protected $autoExpireAfter;
    /**
     * Indicates whether a change to the document is processing and the PDF may be out of date. It is recommended to wait until processing has finished before downloading the PDF. Webhooks are not sent until processing has been completed.
     *
     * @var bool|null
     */
    protected $processing;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTeam(): ?DocumentTeam
    {
        return $this->team;
    }

    public function setTeam(?DocumentTeam $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Temporary URL to original file as PDF, expires in five minutes.
     */
    public function getFileAsPdf(): ?string
    {
        return $this->fileAsPdf;
    }

    /**
     * Temporary URL to original file as PDF, expires in five minutes.
     */
    public function setFileAsPdf(?string $fileAsPdf): self
    {
        $this->fileAsPdf = $fileAsPdf;

        return $this;
    }

    /**
     * Defaults to filename, including extension.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Defaults to filename, including extension.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * ID used to reference document in external system.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * ID used to reference document in external system.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Shared secret used in conjunction with <a href="#section/Frontend-API/SignRequest-js-client-(beta)">SignRequest-js client</a> to grant user access to a document that's not a member of the document's team.
     */
    public function getFrontendId(): ?string
    {
        return $this->frontendId;
    }

    /**
     * Shared secret used in conjunction with <a href="#section/Frontend-API/SignRequest-js-client-(beta)">SignRequest-js client</a> to grant user access to a document that's not a member of the document's team.
     */
    public function setFrontendId(?string $frontendId): self
    {
        $this->frontendId = $frontendId;

        return $this;
    }

    /**
     * Temporary URL to original file, expires in five minutes.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Temporary URL to original file, expires in five minutes.
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     */
    public function getFileFromUrl(): ?string
    {
        return $this->fileFromUrl;
    }

    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     */
    public function setFileFromUrl(?string $fileFromUrl): self
    {
        $this->fileFromUrl = $fileFromUrl;

        return $this;
    }

    /**
     * URL at which to receive [event callbacks](#section/Events/Events-callback) for this document.
     */
    public function getEventsCallbackUrl(): ?string
    {
        return $this->eventsCallbackUrl;
    }

    /**
     * URL at which to receive [event callbacks](#section/Events/Events-callback) for this document.
     */
    public function setEventsCallbackUrl(?string $eventsCallbackUrl): self
    {
        $this->eventsCallbackUrl = $eventsCallbackUrl;

        return $this;
    }

    /**
     * Base64 encoded document content.
     */
    public function getFileFromContent(): ?string
    {
        return $this->fileFromContent;
    }

    /**
     * Base64 encoded document content.
     */
    public function setFileFromContent(?string $fileFromContent): self
    {
        $this->fileFromContent = $fileFromContent;

        return $this;
    }

    /**
     * Filename, including extension. Required when using `file_from_content`.
     */
    public function getFileFromContentName(): ?string
    {
        return $this->fileFromContentName;
    }

    /**
     * Filename, including extension. Required when using `file_from_content`.
     */
    public function setFileFromContentName(?string $fileFromContentName): self
    {
        $this->fileFromContentName = $fileFromContentName;

        return $this;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(?string $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Prefill signer input data, see [prefill tags](#section/Preparing-a-document/Prefill-tags-templates).
     *
     * @return InlinePrefillTags[]|null
     */
    public function getPrefillTags(): ?array
    {
        return $this->prefillTags;
    }

    /**
     * Prefill signer input data, see [prefill tags](#section/Preparing-a-document/Prefill-tags-templates).
     *
     * @param InlinePrefillTags[]|null $prefillTags
     */
    public function setPrefillTags(?array $prefillTags): self
    {
        $this->prefillTags = $prefillTags;

        return $this;
    }

    /**
     * @return InlineIntegrationData[]|null
     */
    public function getIntegrations(): ?array
    {
        return $this->integrations;
    }

    /**
     * @param InlineIntegrationData[]|null $integrations
     */
    public function setIntegrations(?array $integrations): self
    {
        $this->integrations = $integrations;

        return $this;
    }

    public function getFileFromSf(): ?FileFromSf
    {
        return $this->fileFromSf;
    }

    public function setFileFromSf(?FileFromSf $fileFromSf): self
    {
        $this->fileFromSf = $fileFromSf;

        return $this;
    }

    /**
     * Number of days after which a finished document (signed/cancelled/declined) will be automatically deleted.
     */
    public function getAutoDeleteDays(): ?int
    {
        return $this->autoDeleteDays;
    }

    /**
     * Number of days after which a finished document (signed/cancelled/declined) will be automatically deleted.
     */
    public function setAutoDeleteDays(?int $autoDeleteDays): self
    {
        $this->autoDeleteDays = $autoDeleteDays;

        return $this;
    }

    /**
     * Number of days after which a non finished document will be automatically expired.
     */
    public function getAutoExpireDays(): ?int
    {
        return $this->autoExpireDays;
    }

    /**
     * Number of days after which a non finished document will be automatically expired.
     */
    public function setAutoExpireDays(?int $autoExpireDays): self
    {
        $this->autoExpireDays = $autoExpireDays;

        return $this;
    }

    /**
     * Temporary URL to signed document as PDF, expires in five minutes.
     */
    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    /**
     * Temporary URL to signed document as PDF, expires in five minutes.
     */
    public function setPdf(?string $pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired.
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSignrequest(): ?DocumentSignrequest
    {
        return $this->signrequest;
    }

    public function setSignrequest(?DocumentSignrequest $signrequest): self
    {
        $this->signrequest = $signrequest;

        return $this;
    }

    /**
     * Indicates whether document was created using the API.
     */
    public function getApiUsed(): ?bool
    {
        return $this->apiUsed;
    }

    /**
     * Indicates whether document was created using the API.
     */
    public function setApiUsed(?bool $apiUsed): self
    {
        $this->apiUsed = $apiUsed;

        return $this;
    }

    public function getSigningLog(): ?DocumentSigningLog
    {
        return $this->signingLog;
    }

    public function setSigningLog(?DocumentSigningLog $signingLog): self
    {
        $this->signingLog = $signingLog;

        return $this;
    }

    /**
     * SHA256 hash of PDF contents.
     */
    public function getSecurityHash(): ?string
    {
        return $this->securityHash;
    }

    /**
     * SHA256 hash of PDF contents.
     */
    public function setSecurityHash(?string $securityHash): self
    {
        $this->securityHash = $securityHash;

        return $this;
    }

    /**
     * @return DocumentAttachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param DocumentAttachment[]|null $attachments
     */
    public function setAttachments(?array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * Date and time calculated using `auto_delete_days` after which a finished document (signed/cancelled/declined) will be automatically deleted.
     */
    public function getAutoDeleteAfter(): ?DateTime
    {
        return $this->autoDeleteAfter;
    }

    /**
     * Date and time calculated using `auto_delete_days` after which a finished document (signed/cancelled/declined) will be automatically deleted.
     */
    public function setAutoDeleteAfter(?DateTime $autoDeleteAfter): self
    {
        $this->autoDeleteAfter = $autoDeleteAfter;

        return $this;
    }

    /**
     * Indicates whether document was created as part of a sandbox team.
     */
    public function getSandbox(): ?bool
    {
        return $this->sandbox;
    }

    /**
     * Indicates whether document was created as part of a sandbox team.
     */
    public function setSandbox(?bool $sandbox): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    /**
     * Date and time calculated using `auto_expire_days` after which a non finished document will be automatically expired.
     */
    public function getAutoExpireAfter(): ?DateTime
    {
        return $this->autoExpireAfter;
    }

    /**
     * Date and time calculated using `auto_expire_days` after which a non finished document will be automatically expired.
     */
    public function setAutoExpireAfter(?DateTime $autoExpireAfter): self
    {
        $this->autoExpireAfter = $autoExpireAfter;

        return $this;
    }

    /**
     * Indicates whether a change to the document is processing and the PDF may be out of date. It is recommended to wait until processing has finished before downloading the PDF. Webhooks are not sent until processing has been completed.
     */
    public function getProcessing(): ?bool
    {
        return $this->processing;
    }

    /**
     * Indicates whether a change to the document is processing and the PDF may be out of date. It is recommended to wait until processing has finished before downloading the PDF. Webhooks are not sent until processing has been completed.
     */
    public function setProcessing(?bool $processing): self
    {
        $this->processing = $processing;

        return $this;
    }
}
