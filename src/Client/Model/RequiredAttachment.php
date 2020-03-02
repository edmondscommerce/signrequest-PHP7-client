<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class RequiredAttachment
{
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $uuid;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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
}
