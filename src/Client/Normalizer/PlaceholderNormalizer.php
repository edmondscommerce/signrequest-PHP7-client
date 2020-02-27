<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use SignRequest\Client\Model\Placeholder;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
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
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new Placeholder();
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'type')) {
            $object->setType($data->{'type'});
        }
        if (property_exists($data, 'page_index')) {
            $object->setPageIndex($data->{'page_index'});
        }
        if (property_exists($data, 'prefill')) {
            $object->setPrefill($data->{'prefill'});
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
        }
        if ($object->getPageIndex() !== null) {
            $data->{'page_index'} = $object->getPageIndex();
        }
        if ($object->getPrefill() !== null) {
            $data->{'prefill'} = $object->getPrefill();
        }
        $data->{'text'}           = $object->getText();
        $data->{'checkbox_value'} = $object->getCheckboxValue();
        if ($object->getDateValue() !== null) {
            $data->{'date_value'} = $object->getDateValue()->format('Y-m-d');
        } else {
            $data->{'date_value'} = null;
        }
        $data->{'external_id'} = $object->getExternalId();

        return $data;
    }
}
