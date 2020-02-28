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

final class WebhooksGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\WebhooksGetResponse200';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\WebhooksGetResponse200';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\WebhooksGetResponse200();
        if (property_exists($data, 'count')) {
            $object->setCount($data->{'count'});
        }
        if (property_exists($data, 'next') && $data->{'next'} !== null) {
            $object->setNext($data->{'next'});
        } elseif (property_exists($data, 'next') && $data->{'next'} === null) {
            $object->setNext(null);
        }
        if (property_exists($data, 'previous') && $data->{'previous'} !== null) {
            $object->setPrevious($data->{'previous'});
        } elseif (property_exists($data, 'previous') && $data->{'previous'} === null) {
            $object->setPrevious(null);
        }
        if (property_exists($data, 'results')) {
            $values = [];
            foreach ($data->{'results'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\WebhookSubscription', 'json', $context);
            }
            $object->setResults($values);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getCount() !== null) {
            $data->{'count'} = $object->getCount();
        }
        $data->{'next'}     = $object->getNext();
        $data->{'previous'} = $object->getPrevious();
        if ($object->getResults() !== null) {
            $values = [];
            foreach ($object->getResults() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'results'} = $values;
        }

        return $data;
    }
}
