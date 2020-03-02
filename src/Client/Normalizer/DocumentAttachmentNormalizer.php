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
            return null;
        }
        $object = new \SignRequest\Client\Model\DocumentAttachment();
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
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
        if (property_exists($data, 'document') && $data->{'document'} !== null) {
            $object->setDocument($data->{'document'});
        } elseif (property_exists($data, 'document') && $data->{'document'} === null) {
            $object->setDocument(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getName() !== null) {
            $data->{'name'} = $object->getName();
        } else {
            $data->{'name'} = null;
        }
        if ($object->getFileFromContent() !== null) {
            $data->{'file_from_content'} = $object->getFileFromContent();
        } else {
            $data->{'file_from_content'} = null;
        }
        if ($object->getFileFromContentName() !== null) {
            $data->{'file_from_content_name'} = $object->getFileFromContentName();
        } else {
            $data->{'file_from_content_name'} = null;
        }
        if ($object->getFileFromUrl() !== null) {
            $data->{'file_from_url'} = $object->getFileFromUrl();
        } else {
            $data->{'file_from_url'} = null;
        }
        if ($object->getDocument() !== null) {
            $data->{'document'} = $object->getDocument();
        } else {
            $data->{'document'} = null;
        }

        return $data;
    }
}
