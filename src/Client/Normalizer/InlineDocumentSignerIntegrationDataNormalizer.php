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

final class InlineDocumentSignerIntegrationDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\InlineDocumentSignerIntegrationData';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\InlineDocumentSignerIntegrationData';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\InlineDocumentSignerIntegrationData();
        if (property_exists($data, 'integration') && $data->{'integration'} !== null) {
            $object->setIntegration($data->{'integration'});
        } elseif (property_exists($data, 'integration') && $data->{'integration'} === null) {
            $object->setIntegration(null);
        }
        if (property_exists($data, 'integration_data')) {
            $object->setIntegrationData($data->{'integration_data'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data                  = new stdClass();
        $data->{'integration'} = $object->getIntegration();
        if ($object->getIntegrationData() !== null) {
            $data->{'integration_data'} = $object->getIntegrationData();
        }

        return $data;
    }
}
