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

final class TemplatesGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\TemplatesGetResponse200';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\TemplatesGetResponse200';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\TemplatesGetResponse200();
        if (property_exists($data, 'count') && $data->{'count'} !== null) {
            $object->setCount($data->{'count'});
        } elseif (property_exists($data, 'count') && $data->{'count'} === null) {
            $object->setCount(null);
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
        if (property_exists($data, 'results') && $data->{'results'} !== null) {
            $values = [];
            foreach ($data->{'results'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\Template', 'json', $context);
            }
            $object->setResults($values);
        } elseif (property_exists($data, 'results') && $data->{'results'} === null) {
            $object->setResults(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getCount() !== null) {
            $data->{'count'} = $object->getCount();
        } else {
            $data->{'count'} = null;
        }
        if ($object->getNext() !== null) {
            $data->{'next'} = $object->getNext();
        } else {
            $data->{'next'} = null;
        }
        if ($object->getPrevious() !== null) {
            $data->{'previous'} = $object->getPrevious();
        } else {
            $data->{'previous'} = null;
        }
        if ($object->getResults() !== null) {
            $values = [];
            foreach ($object->getResults() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'results'} = $values;
        } else {
            $data->{'results'} = null;
        }

        return $data;
    }
}
