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

final class EventNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\Event';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\Event';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\Event();
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'status') && $data->{'status'} !== null) {
            $object->setStatus($data->{'status'});
        } elseif (property_exists($data, 'status') && $data->{'status'} === null) {
            $object->setStatus(null);
        }
        if (property_exists($data, 'event_type') && $data->{'event_type'} !== null) {
            $object->setEventType($data->{'event_type'});
        } elseif (property_exists($data, 'event_type') && $data->{'event_type'} === null) {
            $object->setEventType(null);
        }
        if (property_exists($data, 'delivered') && $data->{'delivered'} !== null) {
            $object->setDelivered($data->{'delivered'});
        } elseif (property_exists($data, 'delivered') && $data->{'delivered'} === null) {
            $object->setDelivered(null);
        }
        if (property_exists($data, 'delivered_on') && $data->{'delivered_on'} !== null) {
            $object->setDeliveredOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'delivered_on'}));
        } elseif (property_exists($data, 'delivered_on') && $data->{'delivered_on'} === null) {
            $object->setDeliveredOn(null);
        }
        if (property_exists($data, 'callback_status_code') && $data->{'callback_status_code'} !== null) {
            $object->setCallbackStatusCode($data->{'callback_status_code'});
        } elseif (property_exists($data, 'callback_status_code') && $data->{'callback_status_code'} === null) {
            $object->setCallbackStatusCode(null);
        }
        if (property_exists($data, 'timestamp') && $data->{'timestamp'} !== null) {
            $object->setTimestamp(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'timestamp'}));
        } elseif (property_exists($data, 'timestamp') && $data->{'timestamp'} === null) {
            $object->setTimestamp(null);
        }
        if (property_exists($data, 'team') && $data->{'team'} !== null) {
            $object->setTeam($this->denormalizer->denormalize($data->{'team'}, 'SignRequest\\Client\\Model\\EventTeam', 'json', $context));
        } elseif (property_exists($data, 'team') && $data->{'team'} === null) {
            $object->setTeam(null);
        }
        if (property_exists($data, 'document') && $data->{'document'} !== null) {
            $object->setDocument($this->denormalizer->denormalize($data->{'document'}, 'SignRequest\\Client\\Model\\Document', 'json', $context));
        } elseif (property_exists($data, 'document') && $data->{'document'} === null) {
            $object->setDocument(null);
        }
        if (property_exists($data, 'signer') && $data->{'signer'} !== null) {
            $object->setSigner($this->denormalizer->denormalize($data->{'signer'}, 'SignRequest\\Client\\Model\\Signer', 'json', $context));
        } elseif (property_exists($data, 'signer') && $data->{'signer'} === null) {
            $object->setSigner(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getDocument() !== null) {
            $data->{'document'} = $this->normalizer->normalize($object->getDocument(), 'json', $context);
        } else {
            $data->{'document'} = null;
        }
        if ($object->getSigner() !== null) {
            $data->{'signer'} = $this->normalizer->normalize($object->getSigner(), 'json', $context);
        } else {
            $data->{'signer'} = null;
        }

        return $data;
    }
}
