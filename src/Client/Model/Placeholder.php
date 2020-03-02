<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class Placeholder
{
    /**
     * @var string|null
     */
    protected $uuid;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var int|null
     */
    protected $pageIndex;
    /**
     * @var bool|null
     */
    protected $prefill;
    /**
     * @var string|null
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

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPageIndex(): ?int
    {
        return $this->pageIndex;
    }

    public function setPageIndex(?int $pageIndex): self
    {
        $this->pageIndex = $pageIndex;

        return $this;
    }

    public function getPrefill(): ?bool
    {
        return $this->prefill;
    }

    public function setPrefill(?bool $prefill): self
    {
        $this->prefill = $prefill;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
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
}
