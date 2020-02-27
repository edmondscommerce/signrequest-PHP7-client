<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use SignRequest\Client\Model\DocumentSigningLog;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class DocumentSigningLogNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\DocumentSigningLog';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\DocumentSigningLog';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new DocumentSigningLog();
        if (property_exists($data, 'pdf') && $data->{'pdf'} !== null) {
            $object->setPdf($data->{'pdf'});
        } elseif (property_exists($data, 'pdf') && $data->{'pdf'} === null) {
            $object->setPdf(null);
        }
        if (property_exists($data, 'security_hash')) {
            $object->setSecurityHash($data->{'security_hash'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        return new stdClass();
    }
}
