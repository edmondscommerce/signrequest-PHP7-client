<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
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
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\InlineTeamMember();
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'user')) {
            $object->setUser($this->denormalizer->denormalize($data->{'user'}, 'SignRequest\\Client\\Model\\User', 'json', $context));
        }
        if (property_exists($data, 'is_admin')) {
            $object->setIsAdmin($data->{'is_admin'});
        }
        if (property_exists($data, 'is_active')) {
            $object->setIsActive($data->{'is_active'});
        }
        if (property_exists($data, 'is_owner')) {
            $object->setIsOwner($data->{'is_owner'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getUser() !== null) {
            $data->{'user'} = $this->normalizer->normalize($object->getUser(), 'json', $context);
        }
        if ($object->getIsAdmin() !== null) {
            $data->{'is_admin'} = $object->getIsAdmin();
        }
        if ($object->getIsActive() !== null) {
            $data->{'is_active'} = $object->getIsActive();
        }
        if ($object->getIsOwner() !== null) {
            $data->{'is_owner'} = $object->getIsOwner();
        }

        return $data;
    }
}
