<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class DocumentSigningLog
{
    /**
     * Temporary URL to signing log, expires in five minutes.
     *
     * @var string|null
     */
    protected $pdf;
    /**
     * SHA256 hash of PDF contents.
     *
     * @var string
     */
    protected $securityHash;

    /**
     * Temporary URL to signing log, expires in five minutes.
     */
    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    /**
     * Temporary URL to signing log, expires in five minutes.
     */
    public function setPdf(?string $pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * SHA256 hash of PDF contents.
     */
    public function getSecurityHash(): string
    {
        return $this->securityHash;
    }

    /**
     * SHA256 hash of PDF contents.
     */
    public function setSecurityHash(string $securityHash): self
    {
        $this->securityHash = $securityHash;

        return $this;
    }
}
