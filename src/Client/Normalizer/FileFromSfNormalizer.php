<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use stdClass;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class FileFromSfNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\FileFromSf';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\FileFromSf';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\FileFromSf();
        if (property_exists($data, 'object_type') && $data->{'object_type'} !== null) {
            $object->setObjectType($data->{'object_type'});
        } elseif (property_exists($data, 'object_type') && $data->{'object_type'} === null) {
            $object->setObjectType(null);
        }
        if (property_exists($data, 'object_id') && $data->{'object_id'} !== null) {
            $object->setObjectId($data->{'object_id'});
        } elseif (property_exists($data, 'object_id') && $data->{'object_id'} === null) {
            $object->setObjectId(null);
        }
        if (property_exists($data, 'uid') && $data->{'uid'} !== null) {
            $object->setUid($data->{'uid'});
        } elseif (property_exists($data, 'uid') && $data->{'uid'} === null) {
            $object->setUid(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getObjectType() !== null) {
            $data->{'object_type'} = $object->getObjectType();
        } else {
            $data->{'object_type'} = null;
        }
        if ($object->getObjectId() !== null) {
            $data->{'object_id'} = $object->getObjectId();
        } else {
            $data->{'object_id'} = null;
        }
        if ($object->getUid() !== null) {
            $data->{'uid'} = $object->getUid();
        } else {
            $data->{'uid'} = null;
        }

        return $data;
    }
}
