<?php

declare(strict_types=1);

namespace SignRequest\Tests\Assets\Documents;

use InvalidArgumentException;
use function implode;

final class PrefillTagData
{
    public const TYPE_TEXT     = 'text';
    public const TYPE_DATE     = 'date';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPES         = [
        self::TYPE_TEXT,
        self::TYPE_DATE,
        self::TYPE_CHECKBOX,
    ];
    private string $id;
    private string $type;
    private string $value;

    public function __construct(string $id, string $type, string $value)
    {
        if (in_array($type, self::TYPES, true) === false) {
            throw new InvalidArgumentException(
                'Invalid type ' . $type .
                ', must be one of ' . implode(',', self::TYPES)
            );
        }
        $this->id    = $id;
        $this->type  = $type;
        $this->value = $value;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTagData(): array
    {
        $tag                = [];
        $tag['external_id'] = $this->id;
        switch ($this->type) {
            case self::TYPE_DATE:
                return $this->getDateTag($tag);
            case self::TYPE_CHECKBOX:
                return $this->getCheckboxTag($tag);
            case self::TYPE_TEXT:
                return $this->getTextTag($tag);
        }
    }

    private function getDateTag(array $tag): array
    {
        $tag['date_value'] = $this->value;

        return $tag;
    }

    private function getCheckboxTag(array $tag): array
    {
        $tag['checkbox_value'] = $this->value;

        return $tag;
    }

    private function getTextTag(array $tag): array
    {
        $tag['text'] = $this->value;

        return $tag;
    }
}
