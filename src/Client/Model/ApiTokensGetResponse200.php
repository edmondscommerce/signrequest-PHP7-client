<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class ApiTokensGetResponse200
{
    /**
     * @var int
     */
    protected $count;
    /**
     * @var string|null
     */
    protected $next;
    /**
     * @var string|null
     */
    protected $previous;
    /**
     * @var AuthToken[]
     */
    protected $results = [];

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function setNext(?string $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function getPrevious(): ?string
    {
        return $this->previous;
    }

    public function setPrevious(?string $previous): self
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @return AuthToken[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param AuthToken[] $results
     */
    public function setResults(array $results): self
    {
        $this->results = $results;

        return $this;
    }
}
