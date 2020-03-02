<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class Signer
{
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var string|null
     */
    protected $displayName;
    /**
     * @var string|null
     */
    protected $firstName;
    /**
     * @var string|null
     */
    protected $lastName;
    /**
     * @var bool|null
     */
    protected $emailViewed;
    /**
     * @var bool|null
     */
    protected $viewed;
    /**
     * @var bool|null
     */
    protected $signed;
    /**
     * @var bool|null
     */
    protected $downloaded;
    /**
     * @var DateTime|null
     */
    protected $signedOn;
    /**
     * When `false` user does not need to sign, but will receive a copy of the signed document and signing log, see: [Copy only](#section/Additional-signing-methods/Copy-only).
     *
     * @var bool|null
     */
    protected $needsToSign = true;
    /**
     * Require user to approve the document (without adding a signature), see: [Approve only](#section/Additional-signing-methods/Approve-only).
     *
     * @var bool|null
     */
    protected $approveOnly;
    /**
     * Send notifications about the document and a copy of the signed document and signing log, but don't require them to take any action, see: [Notify only](#section/Additional-signing-methods/Notify-only).
     *
     * @var bool|null
     */
    protected $notifyOnly;
    /**
     * When used in combination with an embed url on the sender, after sender has signed, they will be redirected to the next `in_person` signer, see: [In person signing](#section/Additional-signing-methods/In-person-signing).
     *
     * @var bool|null
     */
    protected $inPerson;
    /**
     * @var int|null
     */
    protected $order;
    /**
     * @var string|null
     */
    protected $language;
    /**
     * @var bool|null
     */
    protected $forceLanguage;
    /**
     * @var bool|null
     */
    protected $emailed;
    /**
     * @var string|null
     */
    protected $verifyPhoneNumber;
    /**
     * @var string|null
     */
    protected $verifyBankAccount;
    /**
     * @var bool|null
     */
    protected $declined;
    /**
     * @var DateTime|null
     */
    protected $declinedOn;
    /**
     * @var bool|null
     */
    protected $forwarded;
    /**
     * @var DateTime|null
     */
    protected $forwardedOn;
    /**
     * @var string|null
     */
    protected $forwardedToEmail;
    /**
     * @var string|null
     */
    protected $forwardedReason;
    /**
     * @var string|null
     */
    protected $message;
    /**
     * @var string|null
     */
    protected $embedUrlUserId;
    /**
     * @var SignerInputs[]|null
     */
    protected $inputs = [];
    /**
     * Place an approval stamp on a document when a signer approves a document.
     *
     * @var bool|null
     */
    protected $useStampForApproveOnly;
    /**
     * @var string|null
     */
    protected $embedUrl;
    /**
     * @var SignerAttachment[]|null
     */
    protected $attachments = [];
    /**
     * @var string|null
     */
    protected $redirectUrl;
    /**
     * @var string|null
     */
    protected $redirectUrlDeclined;
    /**
     * @var string|null
     */
    protected $afterDocument;
    /**
     * @var InlineDocumentSignerIntegrationData[]|null
     */
    protected $integrations = [];
    /**
     * Require the signer to enter this password before signing a document. This field is write only.
     *
     * @var string|null
     */
    protected $password;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmailViewed(): ?bool
    {
        return $this->emailViewed;
    }

    public function setEmailViewed(?bool $emailViewed): self
    {
        $this->emailViewed = $emailViewed;

        return $this;
    }

    public function getViewed(): ?bool
    {
        return $this->viewed;
    }

    public function setViewed(?bool $viewed): self
    {
        $this->viewed = $viewed;

        return $this;
    }

    public function getSigned(): ?bool
    {
        return $this->signed;
    }

    public function setSigned(?bool $signed): self
    {
        $this->signed = $signed;

        return $this;
    }

    public function getDownloaded(): ?bool
    {
        return $this->downloaded;
    }

    public function setDownloaded(?bool $downloaded): self
    {
        $this->downloaded = $downloaded;

        return $this;
    }

    public function getSignedOn(): ?DateTime
    {
        return $this->signedOn;
    }

    public function setSignedOn(?DateTime $signedOn): self
    {
        $this->signedOn = $signedOn;

        return $this;
    }

    /**
     * When `false` user does not need to sign, but will receive a copy of the signed document and signing log, see: [Copy only](#section/Additional-signing-methods/Copy-only).
     */
    public function getNeedsToSign(): ?bool
    {
        return $this->needsToSign;
    }

    /**
     * When `false` user does not need to sign, but will receive a copy of the signed document and signing log, see: [Copy only](#section/Additional-signing-methods/Copy-only).
     */
    public function setNeedsToSign(?bool $needsToSign): self
    {
        $this->needsToSign = $needsToSign;

        return $this;
    }

    /**
     * Require user to approve the document (without adding a signature), see: [Approve only](#section/Additional-signing-methods/Approve-only).
     */
    public function getApproveOnly(): ?bool
    {
        return $this->approveOnly;
    }

    /**
     * Require user to approve the document (without adding a signature), see: [Approve only](#section/Additional-signing-methods/Approve-only).
     */
    public function setApproveOnly(?bool $approveOnly): self
    {
        $this->approveOnly = $approveOnly;

        return $this;
    }

    /**
     * Send notifications about the document and a copy of the signed document and signing log, but don't require them to take any action, see: [Notify only](#section/Additional-signing-methods/Notify-only).
     */
    public function getNotifyOnly(): ?bool
    {
        return $this->notifyOnly;
    }

    /**
     * Send notifications about the document and a copy of the signed document and signing log, but don't require them to take any action, see: [Notify only](#section/Additional-signing-methods/Notify-only).
     */
    public function setNotifyOnly(?bool $notifyOnly): self
    {
        $this->notifyOnly = $notifyOnly;

        return $this;
    }

    /**
     * When used in combination with an embed url on the sender, after sender has signed, they will be redirected to the next `in_person` signer, see: [In person signing](#section/Additional-signing-methods/In-person-signing).
     */
    public function getInPerson(): ?bool
    {
        return $this->inPerson;
    }

    /**
     * When used in combination with an embed url on the sender, after sender has signed, they will be redirected to the next `in_person` signer, see: [In person signing](#section/Additional-signing-methods/In-person-signing).
     */
    public function setInPerson(?bool $inPerson): self
    {
        $this->inPerson = $inPerson;

        return $this;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getForceLanguage(): ?bool
    {
        return $this->forceLanguage;
    }

    public function setForceLanguage(?bool $forceLanguage): self
    {
        $this->forceLanguage = $forceLanguage;

        return $this;
    }

    public function getEmailed(): ?bool
    {
        return $this->emailed;
    }

    public function setEmailed(?bool $emailed): self
    {
        $this->emailed = $emailed;

        return $this;
    }

    public function getVerifyPhoneNumber(): ?string
    {
        return $this->verifyPhoneNumber;
    }

    public function setVerifyPhoneNumber(?string $verifyPhoneNumber): self
    {
        $this->verifyPhoneNumber = $verifyPhoneNumber;

        return $this;
    }

    public function getVerifyBankAccount(): ?string
    {
        return $this->verifyBankAccount;
    }

    public function setVerifyBankAccount(?string $verifyBankAccount): self
    {
        $this->verifyBankAccount = $verifyBankAccount;

        return $this;
    }

    public function getDeclined(): ?bool
    {
        return $this->declined;
    }

    public function setDeclined(?bool $declined): self
    {
        $this->declined = $declined;

        return $this;
    }

    public function getDeclinedOn(): ?DateTime
    {
        return $this->declinedOn;
    }

    public function setDeclinedOn(?DateTime $declinedOn): self
    {
        $this->declinedOn = $declinedOn;

        return $this;
    }

    public function getForwarded(): ?bool
    {
        return $this->forwarded;
    }

    public function setForwarded(?bool $forwarded): self
    {
        $this->forwarded = $forwarded;

        return $this;
    }

    public function getForwardedOn(): ?DateTime
    {
        return $this->forwardedOn;
    }

    public function setForwardedOn(?DateTime $forwardedOn): self
    {
        $this->forwardedOn = $forwardedOn;

        return $this;
    }

    public function getForwardedToEmail(): ?string
    {
        return $this->forwardedToEmail;
    }

    public function setForwardedToEmail(?string $forwardedToEmail): self
    {
        $this->forwardedToEmail = $forwardedToEmail;

        return $this;
    }

    public function getForwardedReason(): ?string
    {
        return $this->forwardedReason;
    }

    public function setForwardedReason(?string $forwardedReason): self
    {
        $this->forwardedReason = $forwardedReason;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getEmbedUrlUserId(): ?string
    {
        return $this->embedUrlUserId;
    }

    public function setEmbedUrlUserId(?string $embedUrlUserId): self
    {
        $this->embedUrlUserId = $embedUrlUserId;

        return $this;
    }

    /**
     * @return SignerInputs[]|null
     */
    public function getInputs(): ?array
    {
        return $this->inputs;
    }

    /**
     * @param SignerInputs[]|null $inputs
     */
    public function setInputs(?array $inputs): self
    {
        $this->inputs = $inputs;

        return $this;
    }

    /**
     * Place an approval stamp on a document when a signer approves a document.
     */
    public function getUseStampForApproveOnly(): ?bool
    {
        return $this->useStampForApproveOnly;
    }

    /**
     * Place an approval stamp on a document when a signer approves a document.
     */
    public function setUseStampForApproveOnly(?bool $useStampForApproveOnly): self
    {
        $this->useStampForApproveOnly = $useStampForApproveOnly;

        return $this;
    }

    public function getEmbedUrl(): ?string
    {
        return $this->embedUrl;
    }

    public function setEmbedUrl(?string $embedUrl): self
    {
        $this->embedUrl = $embedUrl;

        return $this;
    }

    /**
     * @return SignerAttachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param SignerAttachment[]|null $attachments
     */
    public function setAttachments(?array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl(?string $redirectUrl): self
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }

    public function getRedirectUrlDeclined(): ?string
    {
        return $this->redirectUrlDeclined;
    }

    public function setRedirectUrlDeclined(?string $redirectUrlDeclined): self
    {
        $this->redirectUrlDeclined = $redirectUrlDeclined;

        return $this;
    }

    public function getAfterDocument(): ?string
    {
        return $this->afterDocument;
    }

    public function setAfterDocument(?string $afterDocument): self
    {
        $this->afterDocument = $afterDocument;

        return $this;
    }

    /**
     * @return InlineDocumentSignerIntegrationData[]|null
     */
    public function getIntegrations(): ?array
    {
        return $this->integrations;
    }

    /**
     * @param InlineDocumentSignerIntegrationData[]|null $integrations
     */
    public function setIntegrations(?array $integrations): self
    {
        $this->integrations = $integrations;

        return $this;
    }

    /**
     * Require the signer to enter this password before signing a document. This field is write only.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Require the signer to enter this password before signing a document. This field is write only.
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
