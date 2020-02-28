<?php declare(strict_types=1);

namespace SignRequest\Tests\Assets\Documents;

use SignRequest\Client\Model\Document;
use SignRequest\Client\Model\SignRequestQuickCreate;
use function base64_encode;
use function file_get_contents;

class HasTagsDocumentFactory implements DocumentFactoryInterface
{
    public const NAME          = 'HasTags';
    public const HTML_TEMPLATE = __DIR__ . '/hasTags.html';

    public function getDocument(PrefillTagsInterface $tags): Document
    {
        $document = new Document();
        $document->setName(self::NAME);
        $document->setFileFromContent($this->getContent());
        $document->setPrefillTags($tags->getData());

        return $document;
    }

    private function getContent(): string
    {
        return base64_encode(file_get_contents(self::HTML_TEMPLATE));
    }

    public function getQuickCreate(PrefillTagsInterface $tags, string $fromEmail): SignRequestQuickCreate
    {
        $quickCreate = new SignRequestQuickCreate();
        $quickCreate->setFromEmail($fromEmail);
        $quickCreate->setFileFromContent($this->getContent());
        $quickCreate->setPrefillTags($tags->getData());

        return $quickCreate;
    }
}
