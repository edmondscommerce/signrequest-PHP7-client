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

final class UserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\User';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\User';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\User();
        if (property_exists($data, 'email') && $data->{'email'} !== null) {
            $object->setEmail($data->{'email'});
        } elseif (property_exists($data, 'email') && $data->{'email'} === null) {
            $object->setEmail(null);
        }
        if (property_exists($data, 'first_name') && $data->{'first_name'} !== null) {
            $object->setFirstName($data->{'first_name'});
        } elseif (property_exists($data, 'first_name') && $data->{'first_name'} === null) {
            $object->setFirstName(null);
        }
        if (property_exists($data, 'last_name') && $data->{'last_name'} !== null) {
            $object->setLastName($data->{'last_name'});
        } elseif (property_exists($data, 'last_name') && $data->{'last_name'} === null) {
            $object->setLastName(null);
        }
        if (property_exists($data, 'display_name') && $data->{'display_name'} !== null) {
            $object->setDisplayName($data->{'display_name'});
        } elseif (property_exists($data, 'display_name') && $data->{'display_name'} === null) {
            $object->setDisplayName(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getEmail() !== null) {
            $data->{'email'} = $object->getEmail();
        } else {
            $data->{'email'} = null;
        }
        if ($object->getFirstName() !== null) {
            $data->{'first_name'} = $object->getFirstName();
        } else {
            $data->{'first_name'} = null;
        }
        if ($object->getLastName() !== null) {
            $data->{'last_name'} = $object->getLastName();
        } else {
            $data->{'last_name'} = null;
        }

        return $data;
    }
}
