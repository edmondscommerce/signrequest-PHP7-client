<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class SignrequestsUuidResendSignrequestEmailPostResponse201
{
    /**
     * @var string
     */
    protected $detail;

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }
}
