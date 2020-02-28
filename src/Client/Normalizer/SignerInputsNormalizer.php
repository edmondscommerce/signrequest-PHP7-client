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

final class SignerInputsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\SignerInputs';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\SignerInputs';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\SignerInputs();
        if (property_exists($data, 'type') && $data->{'type'} !== null) {
            $object->setType($data->{'type'});
        } elseif (property_exists($data, 'type') && $data->{'type'} === null) {
            $object->setType(null);
        }
        if (property_exists($data, 'page_index')) {
            $object->setPageIndex($data->{'page_index'});
        }
        if (property_exists($data, 'text')) {
            $object->setText($data->{'text'});
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
        if (property_exists($data, 'placeholder_uuid') && $data->{'placeholder_uuid'} !== null) {
            $object->setPlaceholderUuid($data->{'placeholder_uuid'});
        } elseif (property_exists($data, 'placeholder_uuid') && $data->{'placeholder_uuid'} === null) {
            $object->setPlaceholderUuid(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data           = new stdClass();
        $data->{'type'} = $object->getType();
        if ($object->getPageIndex() !== null) {
            $data->{'page_index'} = $object->getPageIndex();
        }
        if ($object->getText() !== null) {
            $data->{'text'} = $object->getText();
        }
        $data->{'checkbox_value'} = $object->getCheckboxValue();
        if ($object->getDateValue() !== null) {
            $data->{'date_value'} = $object->getDateValue()->format('Y-m-d');
        } else {
            $data->{'date_value'} = null;
        }
        $data->{'external_id'}      = $object->getExternalId();
        $data->{'placeholder_uuid'} = $object->getPlaceholderUuid();

        return $data;
    }
}
