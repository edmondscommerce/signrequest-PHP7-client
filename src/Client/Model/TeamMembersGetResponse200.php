<?php

declare(strict_types=1);

namespace SignRequest\Client\Model;

final class TeamMembersGetResponse200
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
     * @var TeamMember[]
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
     * @return TeamMember[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param TeamMember[] $results
     */
    public function setResults(array $results): self
    {
        $this->results = $results;

        return $this;
    }
}
