<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class Team
{
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $subdomain;
    /**
     * @var string|null
     */
    protected $url;
    /**
     * @var string|null
     */
    protected $logo;
    /**
     * @var string|null
     */
    protected $phone;
    /**
     * @var string|null
     */
    protected $primaryColor;
    /**
     * @var string|null
     */
    protected $eventsCallbackUrl;
    /**
     * @var InlineTeamMember[]|null
     */
    protected $members = [];
    /**
     * When filled this team will be deleted after this date.
     *
     * @var DateTime|null
     */
    protected $deleteAfter;
    /**
     * Indicates whether team is in Sandbox mode.
     *
     * @var bool|null
     */
    protected $sandbox;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSubdomain(): ?string
    {
        return $this->subdomain;
    }

    public function setSubdomain(?string $subdomain): self
    {
        $this->subdomain = $subdomain;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPrimaryColor(): ?string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(?string $primaryColor): self
    {
        $this->primaryColor = $primaryColor;

        return $this;
    }

    public function getEventsCallbackUrl(): ?string
    {
        return $this->eventsCallbackUrl;
    }

    public function setEventsCallbackUrl(?string $eventsCallbackUrl): self
    {
        $this->eventsCallbackUrl = $eventsCallbackUrl;

        return $this;
    }

    /**
     * @return InlineTeamMember[]|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }

    /**
     * @param InlineTeamMember[]|null $members
     */
    public function setMembers(?array $members): self
    {
        $this->members = $members;

        return $this;
    }

    /**
     * When filled this team will be deleted after this date.
     */
    public function getDeleteAfter(): ?DateTime
    {
        return $this->deleteAfter;
    }

    /**
     * When filled this team will be deleted after this date.
     */
    public function setDeleteAfter(?DateTime $deleteAfter): self
    {
        $this->deleteAfter = $deleteAfter;

        return $this;
    }

    /**
     * Indicates whether team is in Sandbox mode.
     */
    public function getSandbox(): ?bool
    {
        return $this->sandbox;
    }

    /**
     * Indicates whether team is in Sandbox mode.
     */
    public function setSandbox(?bool $sandbox): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }
}
