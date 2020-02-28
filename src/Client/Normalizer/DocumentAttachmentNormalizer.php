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

final class DocumentAttachmentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\DocumentAttachment';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\DocumentAttachment';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\DocumentAttachment();
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
        if (property_exists($data, 'file') && $data->{'file'} !== null) {
            $object->setFile($data->{'file'});
        } elseif (property_exists($data, 'file') && $data->{'file'} === null) {
            $object->setFile(null);
        }
        if (property_exists($data, 'file_from_content') && $data->{'file_from_content'} !== null) {
            $object->setFileFromContent($data->{'file_from_content'});
        } elseif (property_exists($data, 'file_from_content') && $data->{'file_from_content'} === null) {
            $object->setFileFromContent(null);
        }
        if (property_exists($data, 'file_from_content_name') && $data->{'file_from_content_name'} !== null) {
            $object->setFileFromContentName($data->{'file_from_content_name'});
        } elseif (property_exists($data, 'file_from_content_name') && $data->{'file_from_content_name'} === null) {
            $object->setFileFromContentName(null);
        }
        if (property_exists($data, 'file_from_url') && $data->{'file_from_url'} !== null) {
            $object->setFileFromUrl($data->{'file_from_url'});
        } elseif (property_exists($data, 'file_from_url') && $data->{'file_from_url'} === null) {
            $object->setFileFromUrl(null);
        }
        if (property_exists($data, 'document')) {
            $object->setDocument($data->{'document'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data                             = new stdClass();
        $data->{'name'}                   = $object->getName();
        $data->{'file_from_content'}      = $object->getFileFromContent();
        $data->{'file_from_content_name'} = $object->getFileFromContentName();
        $data->{'file_from_url'}          = $object->getFileFromUrl();
        if ($object->getDocument() !== null) {
            $data->{'document'} = $object->getDocument();
        }

        return $data;
    }
}
