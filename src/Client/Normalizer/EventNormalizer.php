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
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\Event();
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'event_type')) {
            $object->setEventType($data->{'event_type'});
        }
        if (property_exists($data, 'delivered')) {
            $object->setDelivered($data->{'delivered'});
        }
        if (property_exists($data, 'delivered_on')) {
            $object->setDeliveredOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'delivered_on'}));
        }
        if (property_exists($data, 'callback_status_code')) {
            $object->setCallbackStatusCode($data->{'callback_status_code'});
        }
        if (property_exists($data, 'timestamp')) {
            $object->setTimestamp(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'timestamp'}));
        }
        if (property_exists($data, 'team')) {
            $object->setTeam($this->denormalizer->denormalize($data->{'team'}, 'SignRequest\\Client\\Model\\EventTeam', 'json', $context));
        }
        if (property_exists($data, 'document')) {
            $object->setDocument($this->denormalizer->denormalize($data->{'document'}, 'SignRequest\\Client\\Model\\Document', 'json', $context));
        }
        if (property_exists($data, 'signer')) {
            $object->setSigner($this->denormalizer->denormalize($data->{'signer'}, 'SignRequest\\Client\\Model\\Signer', 'json', $context));
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getDocument() !== null) {
            $data->{'document'} = $this->normalizer->normalize($object->getDocument(), 'json', $context);
        }
        if ($object->getSigner() !== null) {
            $data->{'signer'} = $this->normalizer->normalize($object->getSigner(), 'json', $context);
        }

        return $data;
    }
}
