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

final class WebhookSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\WebhookSubscription';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\WebhookSubscription';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\WebhookSubscription();
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'name') && $data->{'name'} !== null) {
            $object->setName($data->{'name'});
        } elseif (property_exists($data, 'name') && $data->{'name'} === null) {
            $object->setName(null);
        }
        if (property_exists($data, 'event_type') && $data->{'event_type'} !== null) {
            $object->setEventType($data->{'event_type'});
        } elseif (property_exists($data, 'event_type') && $data->{'event_type'} === null) {
            $object->setEventType(null);
        }
        if (property_exists($data, 'callback_url') && $data->{'callback_url'} !== null) {
            $object->setCallbackUrl($data->{'callback_url'});
        } elseif (property_exists($data, 'callback_url') && $data->{'callback_url'} === null) {
            $object->setCallbackUrl(null);
        }
        if (property_exists($data, 'integration') && $data->{'integration'} !== null) {
            $object->setIntegration($data->{'integration'});
        } elseif (property_exists($data, 'integration') && $data->{'integration'} === null) {
            $object->setIntegration(null);
        }
        if (property_exists($data, 'team') && $data->{'team'} !== null) {
            $object->setTeam($this->denormalizer->denormalize($data->{'team'}, 'SignRequest\\Client\\Model\\WebhookSubscriptionTeam', 'json', $context));
        } elseif (property_exists($data, 'team') && $data->{'team'} === null) {
            $object->setTeam(null);
        }
        if (property_exists($data, 'created') && $data->{'created'} !== null) {
            $object->setCreated(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'created'}));
        } elseif (property_exists($data, 'created') && $data->{'created'} === null) {
            $object->setCreated(null);
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
        if ($object->getEventType() !== null) {
            $data->{'event_type'} = $object->getEventType();
        } else {
            $data->{'event_type'} = null;
        }
        if ($object->getCallbackUrl() !== null) {
            $data->{'callback_url'} = $object->getCallbackUrl();
        } else {
            $data->{'callback_url'} = null;
        }
        if ($object->getIntegration() !== null) {
            $data->{'integration'} = $object->getIntegration();
        } else {
            $data->{'integration'} = null;
        }

        return $data;
    }
}
