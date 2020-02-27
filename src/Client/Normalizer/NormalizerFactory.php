<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

@trigger_error('The "NormalizerFactory" class is deprecated since Jane 5.3, use "JaneObjectNormalizer" instead.', E_USER_DEPRECATED);
/**
 * @deprecated The "NormalizerFactory" class is deprecated since Jane 5.3, use "JaneObjectNormalizer" instead.
 */
final class NormalizerFactory
{
    public static function create(): array
    {
        $normalizers   = [];
        $normalizers[] = new ArrayDenormalizer();
        $normalizers[] = new JaneObjectNormalizer();

        return $normalizers;
    }
}
