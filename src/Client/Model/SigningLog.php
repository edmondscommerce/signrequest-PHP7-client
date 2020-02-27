<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class SigningLog
{
    /**
     * Temporary URL to signing log, expires in five minutes.
     *
     * @var string|null
     */
    protected ?string $pdf;
    /**
     * SHA256 hash of PDF contents.
     *
     * @var string
     */
    protected string $securityHash;

    /**
     * Temporary URL to signing log, expires in five minutes.
     */
    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    /**
     * Temporary URL to signing log, expires in five minutes.
     *
     * @param string|null $pdf
     *
     * @return SigningLog
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
     * @param string $securityHash
     * @return SigningLog
*/
    public function setSecurityHash(string $securityHash): self
    {
        $this->securityHash = $securityHash;

        return $this;
    }
}
