<?php declare(strict_types=1);


namespace SignRequest\Tests\Assets\Documents;


use SignRequest\Client\Model\Document;

interface DocumentFactoryInterface
{
    public function getDocument(PrefillTagsInterface $tags): Document;
}
