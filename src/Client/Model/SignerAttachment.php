<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class SignerAttachment
{
    /**
     * @var string|null
     */
    protected $uuid;
    /**
     * Defaults to filename.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $file;
    /**
     * @var RequiredAttachment|null
     */
    protected $forAttachment;

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Defaults to filename.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Defaults to filename.
     */
    public function setName(?string $name): self
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

    public function getForAttachment(): ?RequiredAttachment
    {
        return $this->forAttachment;
    }

    public function setForAttachment(?RequiredAttachment $forAttachment): self
    {
        $this->forAttachment = $forAttachment;

        return $this;
    }
}
