<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class InviteMember
{
    /**
     * @var string
     */
    protected string $email;
    /**
     * @var bool
     */
    protected bool $isAdmin = false;
    /**
     * @var bool
     */
    protected bool $isOwner = false;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function getIsOwner(): bool
    {
        return $this->isOwner;
    }

    public function setIsOwner(bool $isOwner): self
    {
        $this->isOwner = $isOwner;

        return $this;
    }
}
