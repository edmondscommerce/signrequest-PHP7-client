<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use SignRequest\Client\Model\WebhookSubscription;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
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
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new WebhookSubscription();
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'name') && $data->{'name'} !== null) {
            $object->setName($data->{'name'});
        } elseif (property_exists($data, 'name') && $data->{'name'} === null) {
            $object->setName(null);
        }
        if (property_exists($data, 'event_type')) {
            $object->setEventType($data->{'event_type'});
        }
        if (property_exists($data, 'callback_url')) {
            $object->setCallbackUrl($data->{'callback_url'});
        }
        if (property_exists($data, 'integration') && $data->{'integration'} !== null) {
            $object->setIntegration($data->{'integration'});
        } elseif (property_exists($data, 'integration') && $data->{'integration'} === null) {
            $object->setIntegration(null);
        }
        if (property_exists($data, 'team')) {
            $object->setTeam($this->denormalizer->denormalize($data->{'team'}, 'SignRequest\\Client\\Model\\WebhookSubscriptionTeam', 'json', $context));
        }
        if (property_exists($data, 'created')) {
            $object->setCreated(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'created'}));
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data           = new stdClass();
        $data->{'name'} = $object->getName();
        if ($object->getEventType() !== null) {
            $data->{'event_type'} = $object->getEventType();
        }
        if ($object->getCallbackUrl() !== null) {
            $data->{'callback_url'} = $object->getCallbackUrl();
        }
        $data->{'integration'} = $object->getIntegration();

        return $data;
    }
}
