<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class TeamsGetResponse200
{
    /**
     * @var int
     */
    protected int $count;
    /**
     * @var string|null
     */
    protected ?string $next;
    /**
     * @var string|null
     */
    protected ?string $previous;
    /**
     * @var Team[]
     */
    protected array $results;

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
     * @return Team[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param Team[] $results
     *
     * @return TeamsGetResponse200
     */
    public function setResults(array $results): self
    {
        $this->results = $results;

        return $this;
    }
}
