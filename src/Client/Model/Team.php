<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class Team
{
    /**
     * @var string
     */
    protected string $name;
    /**
     * @var string
     */
    protected string $subdomain;
    /**
     * @var string
     */
    protected string $url;
    /**
     * @var string|null
     */
    protected ?string $logo;
    /**
     * @var string
     */
    protected string $phone;
    /**
     * @var string
     */
    protected string $primaryColor;
    /**
     * @var string|null
     */
    protected ?string $eventsCallbackUrl;
    /**
     * @var InlineTeamMember[]
     */
    protected array $members;
    /**
     * When filled this team will be deleted after this date.
     *
     * @var DateTime
     */
    protected DateTime $deleteAfter;
    /**
     * Indicates whether team is in Sandbox mode.
     *
     * @var bool
     */
    protected bool $sandbox;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSubdomain(): string
    {
        return $this->subdomain;
    }

    public function setSubdomain(string $subdomain): self
    {
        $this->subdomain = $subdomain;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
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

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPrimaryColor(): string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(string $primaryColor): self
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
     * @return InlineTeamMember[]
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * @param InlineTeamMember[] $members
     *
     * @return Team
     */
    public function setMembers(array $members): self
    {
        $this->members = $members;

        return $this;
    }

    /**
     * When filled this team will be deleted after this date.
     */
    public function getDeleteAfter(): DateTime
    {
        return $this->deleteAfter;
    }

    /**
     * When filled this team will be deleted after this date.
     *
     * @param DateTime $deleteAfter
     *
     * @return Team
     */
    public function setDeleteAfter(DateTime $deleteAfter): self
    {
        $this->deleteAfter = $deleteAfter;

        return $this;
    }

    /**
     * Indicates whether team is in Sandbox mode.
     */
    public function getSandbox(): bool
    {
        return $this->sandbox;
    }

    /**
     * Indicates whether team is in Sandbox mode.
     * @param bool $sandbox
     * @return Team
*/
    public function setSandbox(bool $sandbox): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }
}
