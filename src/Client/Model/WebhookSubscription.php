<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

use DateTime;

final class WebhookSubscription
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $uuid;
    /**
     * Optional name to easily identify what webhook is used for.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var string
     */
    protected $eventType;
    /**
     * @var string
     */
    protected $callbackUrl;
    /**
     * @var string|null
     */
    protected $integration;
    /**
     * @var WebhookSubscriptionTeam
     */
    protected $team;
    /**
     * @var DateTime
     */
    protected $created;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    /**
     * Optional name to easily identify what webhook is used for.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Optional name to easily identify what webhook is used for.
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }

    public function setEventType(string $eventType): self
    {
        $this->eventType = $eventType;

        return $this;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    public function getIntegration(): ?string
    {
        return $this->integration;
    }

    public function setIntegration(?string $integration): self
    {
        $this->integration = $integration;

        return $this;
    }

    public function getTeam(): WebhookSubscriptionTeam
    {
        return $this->team;
    }

    public function setTeam(WebhookSubscriptionTeam $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }
}
