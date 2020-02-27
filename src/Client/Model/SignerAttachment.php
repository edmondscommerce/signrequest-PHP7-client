<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class SignerAttachment
{
    /**
     * @var string
     */
    protected string $uuid;
    /**
     * Defaults to filename.
     *
     * @var string
     */
    protected string $name;
    /**
     * @var string|null
     */
    protected ?string $file;
    /**
     * @var RequiredAttachment
     */
    protected RequiredAttachment $forAttachment;

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Defaults to filename.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Defaults to filename.
     *
     * @param string $name
     *
     * @return SignerAttachment
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getForAttachment(): RequiredAttachment
    {
        return $this->forAttachment;
    }

    public function setForAttachment(RequiredAttachment $forAttachment): self
    {
        $this->forAttachment = $forAttachment;

        return $this;
    }
}
