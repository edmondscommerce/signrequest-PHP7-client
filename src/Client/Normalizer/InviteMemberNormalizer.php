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

final class InviteMemberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\InviteMember';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\InviteMember';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\InviteMember();
        if (property_exists($data, 'email') && $data->{'email'} !== null) {
            $object->setEmail($data->{'email'});
        } elseif (property_exists($data, 'email') && $data->{'email'} === null) {
            $object->setEmail(null);
        }
        if (property_exists($data, 'is_admin') && $data->{'is_admin'} !== null) {
            $object->setIsAdmin($data->{'is_admin'});
        } elseif (property_exists($data, 'is_admin') && $data->{'is_admin'} === null) {
            $object->setIsAdmin(null);
        }
        if (property_exists($data, 'is_owner') && $data->{'is_owner'} !== null) {
            $object->setIsOwner($data->{'is_owner'});
        } elseif (property_exists($data, 'is_owner') && $data->{'is_owner'} === null) {
            $object->setIsOwner(null);
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
        if ($object->getIsAdmin() !== null) {
            $data->{'is_admin'} = $object->getIsAdmin();
        } else {
            $data->{'is_admin'} = null;
        }
        if ($object->getIsOwner() !== null) {
            $data->{'is_owner'} = $object->getIsOwner();
        } else {
            $data->{'is_owner'} = null;
        }

        return $data;
    }
}
