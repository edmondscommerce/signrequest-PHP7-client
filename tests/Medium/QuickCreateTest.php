<?php

declare(strict_types=1);

namespace SignRequest\Tests\Medium;

use PHPUnit\Framework\TestCase;
use SignRequest\Client\Client;
use SignRequest\Tests\Assets\Documents\HasTagsDocumentFactory;
use SignRequest\Tests\Assets\Documents\HasTagsPrefillTags;
use SignRequest\Tests\Assets\Documents\PrefillTagData;

/**
 * @internal
 * @coversNothing
 *
 * @small
 */
final class QuickCreateTest extends TestCase
{
    /**
     * @test
     *
     * @see https://ec-sandbox.signrequest.com/api/v1/docs/#tag/signrequest-quick-create
     */
    public function itCanQuickCreateASignRequest(): void
    {
        $tags = new HasTagsPrefillTags(
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER1_COMPANY_NAME,
                PrefillTagData::TYPE_TEXT,
                'signer 1 company'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER1_COMPANY_COUNTRY,
                PrefillTagData::TYPE_TEXT,
                'England'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER1_COMPANY_NUMBER,
                PrefillTagData::TYPE_TEXT,
                'abc123'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER1_COMPANY_ADDRESS,
                PrefillTagData::TYPE_TEXT,
                '1 street address, count, postcode blah'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER2_COMPANY_NAME,
                PrefillTagData::TYPE_TEXT,
                'signer 2 company'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER2_COMPANY_COUNTRY,
                PrefillTagData::TYPE_TEXT,
                'England'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER2_COMPANY_NUMBER,
                PrefillTagData::TYPE_TEXT,
                'abc223'
            ),
            new PrefillTagData(
                HasTagsPrefillTags::ID_SIGNER2_COMPANY_ADDRESS,
                PrefillTagData::TYPE_TEXT,
                '2 street address, count, postcode blah'
            ),
        );

        $document = (new HasTagsDocumentFactory())->getDocument($tags);

        $client = new Client()
    }
}
