<?php declare(strict_types=1);


namespace SignRequest\Tests\Assets\Documents;


use SignRequest\Client\Model\Document;
use SignRequest\Client\Model\SignRequestQuickCreate;

interface DocumentFactoryInterface
{
    public function getDocument(PrefillTagsInterface $tags): Document;

    public function getQuickCreate(PrefillTagsInterface $tags, string $fromEmail): SignRequestQuickCreate;
}
