<?php

declare(strict_types=1);

namespace SignRequest\Tests\Assets\Documents;

use InvalidArgumentException;
use stdClass;
use function implode;
use function in_array;

final class HasTagsPrefillTags implements PrefillTagsInterface
{
    public const ID_SIGNER1_COMPANY_NAME    = 'signer1_company_name';
    public const ID_SIGNER1_COMPANY_COUNTRY = 'signer1_company_country';
    public const ID_SIGNER1_COMPANY_NUMBER  = 'signer1_company_number';
    public const ID_SIGNER1_COMPANY_ADDRESS = 'signer1_company_address';

    public const ID_SIGNER2_COMPANY_NAME    = 'signer2_company_name';
    public const ID_SIGNER2_COMPANY_COUNTRY = 'signer2_company_country';
    public const ID_SIGNER2_COMPANY_NUMBER  = 'signer2_company_number';
    public const ID_SIGNER2_COMPANY_ADDRESS = 'signer2_company_address';

    public const IDS = [
        self::ID_SIGNER1_COMPANY_NAME,
        self::ID_SIGNER1_COMPANY_COUNTRY,
        self::ID_SIGNER1_COMPANY_NUMBER,
        self::ID_SIGNER1_COMPANY_ADDRESS,
        self::ID_SIGNER2_COMPANY_NAME,
        self::ID_SIGNER2_COMPANY_COUNTRY,
        self::ID_SIGNER2_COMPANY_NUMBER,
        self::ID_SIGNER2_COMPANY_ADDRESS,
    ];
    /**
     * @var stdClass[]
     */
    private array $tags = [];

    public function __construct(PrefillTagData ...$tags)
    {
        foreach ($tags as $tag) {
            if (in_array($tag->getId(), self::IDS, true) === false) {
                throw new InvalidArgumentException(
                    'Invalid tag ID ' . $tag->getId(),
                    ' must be one of ' . implode(', ', self::IDS)
                );
            }
            $this->tags[] = $tag->getTagData();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->tags;
    }
}
