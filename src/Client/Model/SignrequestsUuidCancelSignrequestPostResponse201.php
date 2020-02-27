<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class SignrequestsUuidCancelSignrequestPostResponse201
{
    /**
     * @var string
     */
    protected string $detail;
    /**
     * @var bool
     */
    protected bool $cancelled;

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getCancelled(): bool
    {
        return $this->cancelled;
    }

    public function setCancelled(bool $cancelled): self
    {
        $this->cancelled = $cancelled;

        return $this;
    }
}
