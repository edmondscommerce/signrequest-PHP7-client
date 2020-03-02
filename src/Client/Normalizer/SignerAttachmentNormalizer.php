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

final class SignerAttachmentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\SignerAttachment';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\SignerAttachment';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\SignerAttachment();
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
        if (property_exists($data, 'file') && $data->{'file'} !== null) {
            $object->setFile($data->{'file'});
        } elseif (property_exists($data, 'file') && $data->{'file'} === null) {
            $object->setFile(null);
        }
        if (property_exists($data, 'for_attachment') && $data->{'for_attachment'} !== null) {
            $object->setForAttachment($this->denormalizer->denormalize($data->{'for_attachment'}, 'SignRequest\\Client\\Model\\RequiredAttachment', 'json', $context));
        } elseif (property_exists($data, 'for_attachment') && $data->{'for_attachment'} === null) {
            $object->setForAttachment(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getForAttachment() !== null) {
            $data->{'for_attachment'} = $this->normalizer->normalize($object->getForAttachment(), 'json', $context);
        } else {
            $data->{'for_attachment'} = null;
        }

        return $data;
    }
}
