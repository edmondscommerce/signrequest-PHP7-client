<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class DocumentSignerTemplateConf
{
    /**
     * @var int
     */
    protected $signerIndex;
    /**
     * When `false` user does not need to sign, but will receive a copy of the signed document and signing log, see: [Copy only](#section/Additional-signing-methods/Copy-only).
     *
     * @var bool
     */
    protected $needsToSign;
    /**
     * Require user to approve the document (without adding a signature), see: [Approve only](#section/Additional-signing-methods/Approve-only).
     *
     * @var bool
     */
    protected $approveOnly;
    /**
     * Send notifications about the document and a copy of the signed document and signing log, but don't require them to take any action, see: [Notify only](#section/Additional-signing-methods/Notify-only).
     *
     * @var bool
     */
    protected $notifyOnly;
    /**
     * When used in combination with an embed url on the sender, after sender has signed, they will be redirected to the next `in_person` signer, see: [In person signing](#section/Additional-signing-methods/In-person-signing).
     *
     * @var bool
     */
    protected $inPerson;
    /**
     * @var int
     */
    protected $order;
    /**
     * @var Placeholder[]
     */
    protected $placeholders = [];

    public function getSignerIndex(): int
    {
        return $this->signerIndex;
    }

    public function setSignerIndex(int $signerIndex): self
    {
        $this->signerIndex = $signerIndex;

        return $this;
    }

    /**
     * When `false` user does not need to sign, but will receive a copy of the signed document and signing log, see: [Copy only](#section/Additional-signing-methods/Copy-only).
     */
    public function getNeedsToSign(): bool
    {
        return $this->needsToSign;
    }

    /**
     * When `false` user does not need to sign, but will receive a copy of the signed document and signing log, see: [Copy only](#section/Additional-signing-methods/Copy-only).
     */
    public function setNeedsToSign(bool $needsToSign): self
    {
        $this->needsToSign = $needsToSign;

        return $this;
    }

    /**
     * Require user to approve the document (without adding a signature), see: [Approve only](#section/Additional-signing-methods/Approve-only).
     */
    public function getApproveOnly(): bool
    {
        return $this->approveOnly;
    }

    /**
     * Require user to approve the document (without adding a signature), see: [Approve only](#section/Additional-signing-methods/Approve-only).
     */
    public function setApproveOnly(bool $approveOnly): self
    {
        $this->approveOnly = $approveOnly;

        return $this;
    }

    /**
     * Send notifications about the document and a copy of the signed document and signing log, but don't require them to take any action, see: [Notify only](#section/Additional-signing-methods/Notify-only).
     */
    public function getNotifyOnly(): bool
    {
        return $this->notifyOnly;
    }

    /**
     * Send notifications about the document and a copy of the signed document and signing log, but don't require them to take any action, see: [Notify only](#section/Additional-signing-methods/Notify-only).
     */
    public function setNotifyOnly(bool $notifyOnly): self
    {
        $this->notifyOnly = $notifyOnly;

        return $this;
    }

    /**
     * When used in combination with an embed url on the sender, after sender has signed, they will be redirected to the next `in_person` signer, see: [In person signing](#section/Additional-signing-methods/In-person-signing).
     */
    public function getInPerson(): bool
    {
        return $this->inPerson;
    }

    /**
     * When used in combination with an embed url on the sender, after sender has signed, they will be redirected to the next `in_person` signer, see: [In person signing](#section/Additional-signing-methods/In-person-signing).
     */
    public function setInPerson(bool $inPerson): self
    {
        $this->inPerson = $inPerson;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return Placeholder[]
     */
    public function getPlaceholders(): array
    {
        return $this->placeholders;
    }

    /**
     * @param Placeholder[] $placeholders
     */
    public function setPlaceholders(array $placeholders): self
    {
        $this->placeholders = $placeholders;

        return $this;
    }
}
