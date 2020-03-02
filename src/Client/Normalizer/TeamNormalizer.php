<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use stdClass;
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
            return null;
        }
        $object = new \SignRequest\Client\Model\Team();
        if (property_exists($data, 'name') && $data->{'name'} !== null) {
            $object->setName($data->{'name'});
        } elseif (property_exists($data, 'name') && $data->{'name'} === null) {
            $object->setName(null);
        }
        if (property_exists($data, 'subdomain') && $data->{'subdomain'} !== null) {
            $object->setSubdomain($data->{'subdomain'});
        } elseif (property_exists($data, 'subdomain') && $data->{'subdomain'} === null) {
            $object->setSubdomain(null);
        }
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
        if (property_exists($data, 'logo') && $data->{'logo'} !== null) {
            $object->setLogo($data->{'logo'});
        } elseif (property_exists($data, 'logo') && $data->{'logo'} === null) {
            $object->setLogo(null);
        }
        if (property_exists($data, 'phone') && $data->{'phone'} !== null) {
            $object->setPhone($data->{'phone'});
        } elseif (property_exists($data, 'phone') && $data->{'phone'} === null) {
            $object->setPhone(null);
        }
        if (property_exists($data, 'primary_color') && $data->{'primary_color'} !== null) {
            $object->setPrimaryColor($data->{'primary_color'});
        } elseif (property_exists($data, 'primary_color') && $data->{'primary_color'} === null) {
            $object->setPrimaryColor(null);
        }
        if (property_exists($data, 'events_callback_url') && $data->{'events_callback_url'} !== null) {
            $object->setEventsCallbackUrl($data->{'events_callback_url'});
        } elseif (property_exists($data, 'events_callback_url') && $data->{'events_callback_url'} === null) {
            $object->setEventsCallbackUrl(null);
        }
        if (property_exists($data, 'members') && $data->{'members'} !== null) {
            $values = [];
            foreach ($data->{'members'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\InlineTeamMember', 'json', $context);
            }
            $object->setMembers($values);
        } elseif (property_exists($data, 'members') && $data->{'members'} === null) {
            $object->setMembers(null);
        }
        if (property_exists($data, 'delete_after') && $data->{'delete_after'} !== null) {
            $object->setDeleteAfter(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'delete_after'}));
        } elseif (property_exists($data, 'delete_after') && $data->{'delete_after'} === null) {
            $object->setDeleteAfter(null);
        }
        if (property_exists($data, 'sandbox') && $data->{'sandbox'} !== null) {
            $object->setSandbox($data->{'sandbox'});
        } elseif (property_exists($data, 'sandbox') && $data->{'sandbox'} === null) {
            $object->setSandbox(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getName() !== null) {
            $data->{'name'} = $object->getName();
        } else {
            $data->{'name'} = null;
        }
        if ($object->getSubdomain() !== null) {
            $data->{'subdomain'} = $object->getSubdomain();
        } else {
            $data->{'subdomain'} = null;
        }
        if ($object->getPhone() !== null) {
            $data->{'phone'} = $object->getPhone();
        } else {
            $data->{'phone'} = null;
        }
        if ($object->getPrimaryColor() !== null) {
            $data->{'primary_color'} = $object->getPrimaryColor();
        } else {
            $data->{'primary_color'} = null;
        }
        if ($object->getEventsCallbackUrl() !== null) {
            $data->{'events_callback_url'} = $object->getEventsCallbackUrl();
        } else {
            $data->{'events_callback_url'} = null;
        }

        return $data;
    }
}
