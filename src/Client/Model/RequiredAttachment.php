<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class RequiredAttachment
{
    /**
     * @var string
     */
    protected string $name;
    /**
     * @var string
     */
    protected string $uuid;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
