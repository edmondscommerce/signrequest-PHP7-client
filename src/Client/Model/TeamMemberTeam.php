<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class TeamMemberTeam
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
}
