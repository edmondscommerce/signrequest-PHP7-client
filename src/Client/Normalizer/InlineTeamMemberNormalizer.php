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

final class InlineTeamMemberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\InlineTeamMember';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\InlineTeamMember';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\InlineTeamMember();
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
        if (property_exists($data, 'user') && $data->{'user'} !== null) {
            $object->setUser($this->denormalizer->denormalize($data->{'user'}, 'SignRequest\\Client\\Model\\User', 'json', $context));
        } elseif (property_exists($data, 'user') && $data->{'user'} === null) {
            $object->setUser(null);
        }
        if (property_exists($data, 'is_admin') && $data->{'is_admin'} !== null) {
            $object->setIsAdmin($data->{'is_admin'});
        } elseif (property_exists($data, 'is_admin') && $data->{'is_admin'} === null) {
            $object->setIsAdmin(null);
        }
        if (property_exists($data, 'is_active') && $data->{'is_active'} !== null) {
            $object->setIsActive($data->{'is_active'});
        } elseif (property_exists($data, 'is_active') && $data->{'is_active'} === null) {
            $object->setIsActive(null);
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
        if ($object->getUser() !== null) {
            $data->{'user'} = $this->normalizer->normalize($object->getUser(), 'json', $context);
        } else {
            $data->{'user'} = null;
        }
        if ($object->getIsAdmin() !== null) {
            $data->{'is_admin'} = $object->getIsAdmin();
        } else {
            $data->{'is_admin'} = null;
        }
        if ($object->getIsActive() !== null) {
            $data->{'is_active'} = $object->getIsActive();
        } else {
            $data->{'is_active'} = null;
        }
        if ($object->getIsOwner() !== null) {
            $data->{'is_owner'} = $object->getIsOwner();
        } else {
            $data->{'is_owner'} = null;
        }

        return $data;
    }
}
