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

final class PlaceholderNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\Placeholder';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\Placeholder';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\Placeholder();
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'type') && $data->{'type'} !== null) {
            $object->setType($data->{'type'});
        } elseif (property_exists($data, 'type') && $data->{'type'} === null) {
            $object->setType(null);
        }
        if (property_exists($data, 'page_index') && $data->{'page_index'} !== null) {
            $object->setPageIndex($data->{'page_index'});
        } elseif (property_exists($data, 'page_index') && $data->{'page_index'} === null) {
            $object->setPageIndex(null);
        }
        if (property_exists($data, 'prefill') && $data->{'prefill'} !== null) {
            $object->setPrefill($data->{'prefill'});
        } elseif (property_exists($data, 'prefill') && $data->{'prefill'} === null) {
            $object->setPrefill(null);
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
        if (property_exists($data, 'external_id') && $data->{'external_id'} !== null) {
            $object->setExternalId($data->{'external_id'});
        } elseif (property_exists($data, 'external_id') && $data->{'external_id'} === null) {
            $object->setExternalId(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getType() !== null) {
            $data->{'type'} = $object->getType();
        } else {
            $data->{'type'} = null;
        }
        if ($object->getPageIndex() !== null) {
            $data->{'page_index'} = $object->getPageIndex();
        } else {
            $data->{'page_index'} = null;
        }
        if ($object->getPrefill() !== null) {
            $data->{'prefill'} = $object->getPrefill();
        } else {
            $data->{'prefill'} = null;
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
        if ($object->getExternalId() !== null) {
            $data->{'external_id'} = $object->getExternalId();
        } else {
            $data->{'external_id'} = null;
        }

        return $data;
    }
}
