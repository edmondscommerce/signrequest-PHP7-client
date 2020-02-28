<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class SignerInputs
{
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var int
     */
    protected $pageIndex;
    /**
     * @var string
     */
    protected $text;
    /**
     * @var bool|null
     */
    protected $checkboxValue;
    /**
     * @var DateTime|null
     */
    protected $dateValue;
    /**
     * @var string|null
     */
    protected $externalId;
    /**
     * @var string|null
     */
    protected $placeholderUuid;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPageIndex(): int
    {
        return $this->pageIndex;
    }

    public function setPageIndex(int $pageIndex): self
    {
        $this->pageIndex = $pageIndex;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCheckboxValue(): ?bool
    {
        return $this->checkboxValue;
    }

    public function setCheckboxValue(?bool $checkboxValue): self
    {
        $this->checkboxValue = $checkboxValue;

        return $this;
    }

    public function getDateValue(): ?DateTime
    {
        return $this->dateValue;
    }

    public function setDateValue(?DateTime $dateValue): self
    {
        $this->dateValue = $dateValue;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getPlaceholderUuid(): ?string
    {
        return $this->placeholderUuid;
    }

    public function setPlaceholderUuid(?string $placeholderUuid): self
    {
        $this->placeholderUuid = $placeholderUuid;

        return $this;
    }
}
