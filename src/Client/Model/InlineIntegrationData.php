<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class InlineIntegrationData
{
    /**
     * @var string|null
     */
    protected $integration;
    /**
     * @var mixed|null
     */
    protected $integrationData;

    public function getIntegration(): ?string
    {
        return $this->integration;
    }

    public function setIntegration(?string $integration): self
    {
        $this->integration = $integration;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntegrationData()
    {
        return $this->integrationData;
    }

    /**
     * @param mixed $integrationData
     */
    public function setIntegrationData($integrationData): self
    {
        $this->integrationData = $integrationData;

        return $this;
    }
}
