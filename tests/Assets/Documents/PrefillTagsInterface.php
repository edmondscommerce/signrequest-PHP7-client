<?php declare(strict_types=1);

namespace SignRequest\Tests\Assets\Documents;

interface PrefillTagsInterface
{
    public function __construct(PrefillTagData ...$tags);

    /**
     * @see https://signrequest.com/api/v1/docs/#section/Preparing-a-document/Prefill-tags-templates
     * @return array
     */
    public function getData(): array;
}
