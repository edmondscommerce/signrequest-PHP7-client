<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class Template
{
    /**
     * @var string|null
     */
    protected $url;
    /**
     * Defaults to filename.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $uuid;
    /**
     * @var User|null
     */
    protected $user;
    /**
     * @var TemplateTeam|null
     */
    protected $team;
    /**
     * `m`: only me, `mo`: me and others, `o`: only others.
     *
     * @var string|null
     */
    protected $who;
    /**
     * @var DocumentSignerTemplateConf[]|null
     */
    protected $signers = [];

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTeam(): ?TemplateTeam
    {
        return $this->team;
    }

    public function setTeam(?TemplateTeam $team): self
    {
        $this->team = $team;

        return $this;
    }

    /**
     * `m`: only me, `mo`: me and others, `o`: only others.
     */
    public function getWho(): ?string
    {
        return $this->who;
    }

    /**
     * `m`: only me, `mo`: me and others, `o`: only others.
     */
    public function setWho(?string $who): self
    {
        $this->who = $who;

        return $this;
    }

    /**
     * @return DocumentSignerTemplateConf[]|null
     */
    public function getSigners(): ?array
    {
        return $this->signers;
    }

    /**
     * @param DocumentSignerTemplateConf[]|null $signers
     */
    public function setSigners(?array $signers): self
    {
        $this->signers = $signers;

        return $this;
    }
}
