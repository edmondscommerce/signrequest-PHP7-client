<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class Document
{
    /**
     * @var string
     */
    protected string $url;
    /**
     * @var DocumentTeam
     */
    protected DocumentTeam $team;
    /**
     * @var string
     */
    protected string $uuid;
    /**
     * @var User
     */
    protected User $user;
    /**
     * Temporary URL to original file as PDF, expires in five minutes.
     *
     * @var string
     */
    protected string $fileAsPdf;
    /**
     * Defaults to filename, including extension.
     *
     * @var string|null
     */
    protected ?string $name;
    /**
     * ID used to reference document in external system.
     *
     * @var string|null
     */
    protected ?string $externalId;
    /**
     * Shared secret used in conjunction with <a href="#section/Frontend-API/SignRequest-js-client-(beta)">SignRequest-js client</a> to grant user access to a document that's not a member of the document's team.
     *
     * @var string|null
     */
    protected ?string $frontendId;
    /**
     * Temporary URL to original file, expires in five minutes.
     *
     * @var string|null
     */
    protected ?string $file;
    /**
     * Publicly accessible URL of document to be downloaded by SignRequest.
     *
     * @var string|null
     */
    protected ?string $fileFromUrl;
    /**
     * URL at which to receive [event callbacks](#section/Events/Events-callback) for this document.
     *
     * @var string|null
     */
    protected ?string $eventsCallbackUrl;
    /**
     * Base64 encoded document content.
     *
     * @var string|null
     */
    protected ?string $fileFromContent;
    /**
     * Filename, including extension. Required when using `file_from_content`.
     *
     * @var string|null
     */
    protected ?string $fileFromContentName;
    /**
     * @var string|null
     */
    protected ?string $template;
    /**
     * Prefill signer input data, see [prefill tags](#section/Preparing-a-document/Prefill-tags-templates).
     *
     * @var InlinePrefillTags[]
     */
    protected array $prefillTags;
    /**
     * @var InlineIntegrationData[]
     */
    protected array $integrations;
    /**
     * @var FileFromSf
     */
    protected FileFromSf $fileFromSf;
    /**
     * Number of days after which a finished document (signed/cancelled/declined) will be automatically deleted.
     *
     * @var int|null
     */
    protected ?int $autoDeleteDays;
    /**
     * Number of days after which a non finished document will be automatically expired.
     *
     * @var int|null
     */
    protected ?int $autoExpireDays;
    /**
     * Temporary URL to signed document as PDF, expires in five minutes.
     *
     * @var string
     */
    protected string $pdf;
    /**
     * `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired.
     *
     * @var string
     */
    protected string $status;
    /**
     * @var DocumentSignrequest
     */
    protected DocumentSignrequest $signrequest;
    /**
     * Indicates whether document was created using the API.
     *
     * @var bool
     */
    protected bool $apiUsed;
    /**
     * @var DocumentSigningLog
     */
    protected DocumentSigningLog $signingLog;
    /**
     * SHA256 hash of PDF contents.
     *
     * @var string
     */
    protected string $securityHash;
    /**
     * @var DocumentAttachment[]
     */
    protected array $attachments;
    /**
     * Date and time calculated using `auto_delete_days` after which a finished document (signed/cancelled/declined) will be automatically deleted.
     *
     * @var DateTime
     */
    protected DateTime $autoDeleteAfter;
    /**
     * Indicates whether document was created as part of a sandbox team.
     *
     * @var bool|null
     */
    protected ?bool $sandbox;
    /**
     * Date and time calculated using `auto_expire_days` after which a non finished document will be automatically expired.
     *
     * @var DateTime
     */
    protected DateTime $autoExpireAfter;
    /**
     * Indicates whether a change to the document is processing and the PDF may be out of date. It is recommended to wait until processing has finished before downloading the PDF. Webhooks are not sent until processing has been completed.
     *
     * @var bool
     */
    protected bool $processing;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTeam(): DocumentTeam
    {
        return $this->team;
    }

    public function setTeam(DocumentTeam $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Temporary URL to original file as PDF, expires in five minutes.
     */
    public function getFileAsPdf(): string
    {
        return $this->fileAsPdf;
    }

    /**
     * Temporary URL to original file as PDF, expires in five minutes.
     *
     * @param string $fileAsPdf
     *
     * @return Document
     */
    public function setFileAsPdf(string $fileAsPdf): self
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
     * @param string|null $name
     * @return Document
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
     * @param string|null $externalId
     * @return Document
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
     * @param string|null $frontendId
     * @return Document
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
     * @param string|null $file
     * @return Document
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
     * @param string|null $fileFromUrl
     * @return Document
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
     * @param string|null $eventsCallbackUrl
     * @return Document
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
     * @param string|null $fileFromContent
     * @return Document
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
     * @param string|null $fileFromContentName
     * @return Document
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
     * @return InlinePrefillTags[]
     */
    public function getPrefillTags(): array
    {
        return $this->prefillTags;
    }

    /**
     * Prefill signer input data, see [prefill tags](#section/Preparing-a-document/Prefill-tags-templates).
     *
     * @param InlinePrefillTags[] $prefillTags
     *
     * @return Document
     */
    public function setPrefillTags(array $prefillTags): self
    {
        $this->prefillTags = $prefillTags;

        return $this;
    }

    /**
     * @return InlineIntegrationData[]
     */
    public function getIntegrations(): array
    {
        return $this->integrations;
    }

    /**
     * @param InlineIntegrationData[] $integrations
     *
     * @return Document
     */
    public function setIntegrations(array $integrations): self
    {
        $this->integrations = $integrations;

        return $this;
    }

    public function getFileFromSf(): FileFromSf
    {
        return $this->fileFromSf;
    }

    public function setFileFromSf(FileFromSf $fileFromSf): self
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
     * @param int|null $autoDeleteDays
     * @return Document
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
     * @param int|null $autoExpireDays
     * @return Document
*/
    public function setAutoExpireDays(?int $autoExpireDays): self
    {
        $this->autoExpireDays = $autoExpireDays;

        return $this;
    }

    /**
     * Temporary URL to signed document as PDF, expires in five minutes.
     */
    public function getPdf(): string
    {
        return $this->pdf;
    }

    /**
     * Temporary URL to signed document as PDF, expires in five minutes.
     * @param string $pdf
     * @return Document
*/
    public function setPdf(string $pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * `co`: converting, `ne`: new, `se`: sent, `vi`: viewed, `si`: signed, `do`: downloaded, `sd`: signed and downloaded, `ca`: cancelled, `de`: declined, `ec`: error converting, `es`: error sending, `xp`: expired.
     * @param string $status
     * @return Document
*/
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSignrequest(): DocumentSignrequest
    {
        return $this->signrequest;
    }

    public function setSignrequest(DocumentSignrequest $signrequest): self
    {
        $this->signrequest = $signrequest;

        return $this;
    }

    /**
     * Indicates whether document was created using the API.
     */
    public function getApiUsed(): bool
    {
        return $this->apiUsed;
    }

    /**
     * Indicates whether document was created using the API.
     * @param bool $apiUsed
     * @return Document
*/
    public function setApiUsed(bool $apiUsed): self
    {
        $this->apiUsed = $apiUsed;

        return $this;
    }

    public function getSigningLog(): DocumentSigningLog
    {
        return $this->signingLog;
    }

    public function setSigningLog(DocumentSigningLog $signingLog): self
    {
        $this->signingLog = $signingLog;

        return $this;
    }

    /**
     * SHA256 hash of PDF contents.
     */
    public function getSecurityHash(): string
    {
        return $this->securityHash;
    }

    /**
     * SHA256 hash of PDF contents.
     * @param string $securityHash
     * @return Document
*/
    public function setSecurityHash(string $securityHash): self
    {
        $this->securityHash = $securityHash;

        return $this;
    }

    /**
     * @return DocumentAttachment[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param DocumentAttachment[] $attachments
     *
     * @return Document
     */
    public function setAttachments(array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * Date and time calculated using `auto_delete_days` after which a finished document (signed/cancelled/declined) will be automatically deleted.
     */
    public function getAutoDeleteAfter(): DateTime
    {
        return $this->autoDeleteAfter;
    }

    /**
     * Date and time calculated using `auto_delete_days` after which a finished document (signed/cancelled/declined) will be automatically deleted.
     * @param DateTime $autoDeleteAfter
     * @return Document
*/
    public function setAutoDeleteAfter(DateTime $autoDeleteAfter): self
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
     * @param bool|null $sandbox
     * @return Document
*/
    public function setSandbox(?bool $sandbox): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    /**
     * Date and time calculated using `auto_expire_days` after which a non finished document will be automatically expired.
     */
    public function getAutoExpireAfter(): DateTime
    {
        return $this->autoExpireAfter;
    }

    /**
     * Date and time calculated using `auto_expire_days` after which a non finished document will be automatically expired.
     * @param DateTime $autoExpireAfter
     * @return Document
*/
    public function setAutoExpireAfter(DateTime $autoExpireAfter): self
    {
        $this->autoExpireAfter = $autoExpireAfter;

        return $this;
    }

    /**
     * Indicates whether a change to the document is processing and the PDF may be out of date. It is recommended to wait until processing has finished before downloading the PDF. Webhooks are not sent until processing has been completed.
     */
    public function getProcessing(): bool
    {
        return $this->processing;
    }

    /**
     * Indicates whether a change to the document is processing and the PDF may be out of date. It is recommended to wait until processing has finished before downloading the PDF. Webhooks are not sent until processing has been completed.
     * @param bool $processing
     * @return Document
*/
    public function setProcessing(bool $processing): self
    {
        $this->processing = $processing;

        return $this;
    }
}
