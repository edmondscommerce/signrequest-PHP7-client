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

final class InlinePrefillTagsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\InlinePrefillTags';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\InlinePrefillTags';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\InlinePrefillTags();
        if (property_exists($data, 'external_id') && $data->{'external_id'} !== null) {
            $object->setExternalId($data->{'external_id'});
        } elseif (property_exists($data, 'external_id') && $data->{'external_id'} === null) {
            $object->setExternalId(null);
        }
        if (property_exists($data, 'text') && $data->{'text'} !== null) {
            $object->setText($data->{'text'});
        } elseif (property_exists($data, 'text') && $data->{'text'} === null) {
            $object->setText(null);
        }
        if (property_exists($data, 'checkbox_value') && $data->{'checkbox_value'} !== null) {
            $object->setCheckboxValue($data->{'checkbox_value'});
        } elseif (property_exists($data, 'checkbox_value') && $data->{'checkbox_value'} === null) {
            $object->setCheckboxValue(null);
        }
        if (property_exists($data, 'date_value') && $data->{'date_value'} !== null) {
            $object->setDateValue(DateTime::createFromFormat('Y-m-d', $data->{'date_value'})->setTime(0, 0, 0));
        } elseif (property_exists($data, 'date_value') && $data->{'date_value'} === null) {
            $object->setDateValue(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getExternalId() !== null) {
            $data->{'external_id'} = $object->getExternalId();
        } else {
            $data->{'external_id'} = null;
        }
        if ($object->getText() !== null) {
            $data->{'text'} = $object->getText();
        } else {
            $data->{'text'} = null;
        }
        if ($object->getCheckboxValue() !== null) {
            $data->{'checkbox_value'} = $object->getCheckboxValue();
        } else {
            $data->{'checkbox_value'} = null;
        }
        if ($object->getDateValue() !== null) {
            $data->{'date_value'} = $object->getDateValue()->format('Y-m-d');
        } else {
            $data->{'date_value'} = null;
        }

        return $data;
    }
}
