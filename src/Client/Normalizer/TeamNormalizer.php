<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class TeamNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\Team';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\Team';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\Team();
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'subdomain')) {
            $object->setSubdomain($data->{'subdomain'});
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'logo') && $data->{'logo'} !== null) {
            $object->setLogo($data->{'logo'});
        } elseif (property_exists($data, 'logo') && $data->{'logo'} === null) {
            $object->setLogo(null);
        }
        if (property_exists($data, 'phone')) {
            $object->setPhone($data->{'phone'});
        }
        if (property_exists($data, 'primary_color')) {
            $object->setPrimaryColor($data->{'primary_color'});
        }
        if (property_exists($data, 'events_callback_url') && $data->{'events_callback_url'} !== null) {
            $object->setEventsCallbackUrl($data->{'events_callback_url'});
        } elseif (property_exists($data, 'events_callback_url') && $data->{'events_callback_url'} === null) {
            $object->setEventsCallbackUrl(null);
        }
        if (property_exists($data, 'members')) {
            $values = [];
            foreach ($data->{'members'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\InlineTeamMember', 'json', $context);
            }
            $object->setMembers($values);
        }
        if (property_exists($data, 'delete_after')) {
            $object->setDeleteAfter(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'delete_after'}));
        }
        if (property_exists($data, 'sandbox')) {
            $object->setSandbox($data->{'sandbox'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getName() !== null) {
            $data->{'name'} = $object->getName();
        }
        if ($object->getSubdomain() !== null) {
            $data->{'subdomain'} = $object->getSubdomain();
        }
        if ($object->getPhone() !== null) {
            $data->{'phone'} = $object->getPhone();
        }
        if ($object->getPrimaryColor() !== null) {
            $data->{'primary_color'} = $object->getPrimaryColor();
        }
        $data->{'events_callback_url'} = $object->getEventsCallbackUrl();

        return $data;
    }
}
