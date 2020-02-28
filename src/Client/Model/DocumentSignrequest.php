<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class DocumentSignrequest
{
    /**
     * Email of user sending the SignRequest (must be a validated email).
     *
     * @var string
     */
    protected $fromEmail;
    /**
     * Name to be used in the `From` email header, e.g. `{from_email_name} <no-reply@signrequest.com>`.
     *
     * @var string
     */
    protected $fromEmailName;
    /**
     * Have the sender of a SignRequest prepare the document before sending the request out, see: [prepare using the web interface](#section/Preparing-a-document/Prepare-using-the-web-interface).
     *
     * @var bool|null
     */
    protected $isBeingPrepared;
    /**
     * @var string
     */
    protected $prepareUrl;
    /**
     * URL at which SignRequest will redirect to when a document is signed.
     *
     * @var string
     */
    protected $redirectUrl;
    /**
     * URL at which SignRequest will redirect to when a document is declined.
     *
     * @var string
     */
    protected $redirectUrlDeclined;
    /**
     * @var RequiredAttachment[]
     */
    protected $requiredAttachments;
    /**
     * Disable uploading/adding of attachments.
     *
     * @var bool
     */
    protected $disableAttachments;
    /**
     * Disable usage of signatures generated by typing (text).
     *
     * @var bool
     */
    protected $disableTextSignatures;
    /**
     * Disable adding of text.
     *
     * @var bool
     */
    protected $disableText;
    /**
     * Disable adding of dates.
     *
     * @var bool
     */
    protected $disableDate;
    /**
     * Disable all SignRequest status emails as well as the email that contains the signed documents.
     *
     * @var bool
     */
    protected $disableEmails;
    /**
     * Disable usage of uploaded signatures (images).
     *
     * @var bool
     */
    protected $disableUploadSignatures;
    /**
     * Disables storing timestamp proof hashes in blockchain integrations.
     *
     * @var bool|null
     */
    protected $disableBlockchainProof;
    /**
     * When true a text message verification is needed before the signer can see the document.
     *
     * @var bool|null
     */
    protected $textMessageVerificationLocked;
    /**
     * Subject of SignRequest email.
     *
     * @var string
     */
    protected $subject;
    /**
     * Message to include in SignRequest email, may contain the following html tags: `a`, `abbr`, `acronym`, `b`, `blockquote`, `code`, `em`, `i`, `ul`, `li`, `ol`, and `strong`.
     *
     * @var string
     */
    protected $message;
    /**
     * `m`: only me, `mo`: me and others, `o`: only others.
     *
     * @var string
     */
    protected $who;
    /**
     * Automatically remind signers to sign a document, see: [automatic reminders](#section/Working-with-a-SignRequest/Automatic-reminders).
     *
     * @var bool
     */
    protected $sendReminders;
    /**
     * @var Signer[]
     */
    protected $signers;
    /**
     * @var string
     */
    protected $uuid;

    /**
     * Email of user sending the SignRequest (must be a validated email).
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    /**
     * Email of user sending the SignRequest (must be a validated email).
     */
    public function setFromEmail(string $fromEmail): self
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * Name to be used in the `From` email header, e.g. `{from_email_name} <no-reply@signrequest.com>`.
     */
    public function getFromEmailName(): string
    {
        return $this->fromEmailName;
    }

    /**
     * Name to be used in the `From` email header, e.g. `{from_email_name} <no-reply@signrequest.com>`.
     */
    public function setFromEmailName(string $fromEmailName): self
    {
        $this->fromEmailName = $fromEmailName;

        return $this;
    }

    /**
     * Have the sender of a SignRequest prepare the document before sending the request out, see: [prepare using the web interface](#section/Preparing-a-document/Prepare-using-the-web-interface).
     */
    public function getIsBeingPrepared(): ?bool
    {
        return $this->isBeingPrepared;
    }

    /**
     * Have the sender of a SignRequest prepare the document before sending the request out, see: [prepare using the web interface](#section/Preparing-a-document/Prepare-using-the-web-interface).
     */
    public function setIsBeingPrepared(?bool $isBeingPrepared): self
    {
        $this->isBeingPrepared = $isBeingPrepared;

        return $this;
    }

    public function getPrepareUrl(): string
    {
        return $this->prepareUrl;
    }

    public function setPrepareUrl(string $prepareUrl): self
    {
        $this->prepareUrl = $prepareUrl;

        return $this;
    }

    /**
     * URL at which SignRequest will redirect to when a document is signed.
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * URL at which SignRequest will redirect to when a document is signed.
     */
    public function setRedirectUrl(string $redirectUrl): self
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }

    /**
     * URL at which SignRequest will redirect to when a document is declined.
     */
    public function getRedirectUrlDeclined(): string
    {
        return $this->redirectUrlDeclined;
    }

    /**
     * URL at which SignRequest will redirect to when a document is declined.
     */
    public function setRedirectUrlDeclined(string $redirectUrlDeclined): self
    {
        $this->redirectUrlDeclined = $redirectUrlDeclined;

        return $this;
    }

    /**
     * @return RequiredAttachment[]
     */
    public function getRequiredAttachments(): array
    {
        return $this->requiredAttachments;
    }

    /**
     * @param RequiredAttachment[] $requiredAttachments
     */
    public function setRequiredAttachments(array $requiredAttachments): self
    {
        $this->requiredAttachments = $requiredAttachments;

        return $this;
    }

    /**
     * Disable uploading/adding of attachments.
     */
    public function getDisableAttachments(): bool
    {
        return $this->disableAttachments;
    }

    /**
     * Disable uploading/adding of attachments.
     */
    public function setDisableAttachments(bool $disableAttachments): self
    {
        $this->disableAttachments = $disableAttachments;

        return $this;
    }

    /**
     * Disable usage of signatures generated by typing (text).
     */
    public function getDisableTextSignatures(): bool
    {
        return $this->disableTextSignatures;
    }

    /**
     * Disable usage of signatures generated by typing (text).
     */
    public function setDisableTextSignatures(bool $disableTextSignatures): self
    {
        $this->disableTextSignatures = $disableTextSignatures;

        return $this;
    }

    /**
     * Disable adding of text.
     */
    public function getDisableText(): bool
    {
        return $this->disableText;
    }

    /**
     * Disable adding of text.
     */
    public function setDisableText(bool $disableText): self
    {
        $this->disableText = $disableText;

        return $this;
    }

    /**
     * Disable adding of dates.
     */
    public function getDisableDate(): bool
    {
        return $this->disableDate;
    }

    /**
     * Disable adding of dates.
     */
    public function setDisableDate(bool $disableDate): self
    {
        $this->disableDate = $disableDate;

        return $this;
    }

    /**
     * Disable all SignRequest status emails as well as the email that contains the signed documents.
     */
    public function getDisableEmails(): bool
    {
        return $this->disableEmails;
    }

    /**
     * Disable all SignRequest status emails as well as the email that contains the signed documents.
     */
    public function setDisableEmails(bool $disableEmails): self
    {
        $this->disableEmails = $disableEmails;

        return $this;
    }

    /**
     * Disable usage of uploaded signatures (images).
     */
    public function getDisableUploadSignatures(): bool
    {
        return $this->disableUploadSignatures;
    }

    /**
     * Disable usage of uploaded signatures (images).
     */
    public function setDisableUploadSignatures(bool $disableUploadSignatures): self
    {
        $this->disableUploadSignatures = $disableUploadSignatures;

        return $this;
    }

    /**
     * Disables storing timestamp proof hashes in blockchain integrations.
     */
    public function getDisableBlockchainProof(): ?bool
    {
        return $this->disableBlockchainProof;
    }

    /**
     * Disables storing timestamp proof hashes in blockchain integrations.
     */
    public function setDisableBlockchainProof(?bool $disableBlockchainProof): self
    {
        $this->disableBlockchainProof = $disableBlockchainProof;

        return $this;
    }

    /**
     * When true a text message verification is needed before the signer can see the document.
     */
    public function getTextMessageVerificationLocked(): ?bool
    {
        return $this->textMessageVerificationLocked;
    }

    /**
     * When true a text message verification is needed before the signer can see the document.
     */
    public function setTextMessageVerificationLocked(?bool $textMessageVerificationLocked): self
    {
        $this->textMessageVerificationLocked = $textMessageVerificationLocked;

        return $this;
    }

    /**
     * Subject of SignRequest email.
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Subject of SignRequest email.
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Message to include in SignRequest email, may contain the following html tags: `a`, `abbr`, `acronym`, `b`, `blockquote`, `code`, `em`, `i`, `ul`, `li`, `ol`, and `strong`.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Message to include in SignRequest email, may contain the following html tags: `a`, `abbr`, `acronym`, `b`, `blockquote`, `code`, `em`, `i`, `ul`, `li`, `ol`, and `strong`.
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * `m`: only me, `mo`: me and others, `o`: only others.
     */
    public function getWho(): string
    {
        return $this->who;
    }

    /**
     * `m`: only me, `mo`: me and others, `o`: only others.
     */
    public function setWho(string $who): self
    {
        $this->who = $who;

        return $this;
    }

    /**
     * Automatically remind signers to sign a document, see: [automatic reminders](#section/Working-with-a-SignRequest/Automatic-reminders).
     */
    public function getSendReminders(): bool
    {
        return $this->sendReminders;
    }

    /**
     * Automatically remind signers to sign a document, see: [automatic reminders](#section/Working-with-a-SignRequest/Automatic-reminders).
     */
    public function setSendReminders(bool $sendReminders): self
    {
        $this->sendReminders = $sendReminders;

        return $this;
    }

    /**
     * @return Signer[]
     */
    public function getSigners(): array
    {
        return $this->signers;
    }

    /**
     * @param Signer[] $signers
     */
    public function setSigners(array $signers): self
    {
        $this->signers = $signers;

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
}
