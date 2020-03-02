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

final class DocumentSignerTemplateConfNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\DocumentSignerTemplateConf';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\DocumentSignerTemplateConf';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\DocumentSignerTemplateConf();
        if (property_exists($data, 'signer_index') && $data->{'signer_index'} !== null) {
            $object->setSignerIndex($data->{'signer_index'});
        } elseif (property_exists($data, 'signer_index') && $data->{'signer_index'} === null) {
            $object->setSignerIndex(null);
        }
        if (property_exists($data, 'needs_to_sign') && $data->{'needs_to_sign'} !== null) {
            $object->setNeedsToSign($data->{'needs_to_sign'});
        } elseif (property_exists($data, 'needs_to_sign') && $data->{'needs_to_sign'} === null) {
            $object->setNeedsToSign(null);
        }
        if (property_exists($data, 'approve_only') && $data->{'approve_only'} !== null) {
            $object->setApproveOnly($data->{'approve_only'});
        } elseif (property_exists($data, 'approve_only') && $data->{'approve_only'} === null) {
            $object->setApproveOnly(null);
        }
        if (property_exists($data, 'notify_only') && $data->{'notify_only'} !== null) {
            $object->setNotifyOnly($data->{'notify_only'});
        } elseif (property_exists($data, 'notify_only') && $data->{'notify_only'} === null) {
            $object->setNotifyOnly(null);
        }
        if (property_exists($data, 'in_person') && $data->{'in_person'} !== null) {
            $object->setInPerson($data->{'in_person'});
        } elseif (property_exists($data, 'in_person') && $data->{'in_person'} === null) {
            $object->setInPerson(null);
        }
        if (property_exists($data, 'order') && $data->{'order'} !== null) {
            $object->setOrder($data->{'order'});
        } elseif (property_exists($data, 'order') && $data->{'order'} === null) {
            $object->setOrder(null);
        }
        if (property_exists($data, 'placeholders') && $data->{'placeholders'} !== null) {
            $values = [];
            foreach ($data->{'placeholders'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\Placeholder', 'json', $context);
            }
            $object->setPlaceholders($values);
        } elseif (property_exists($data, 'placeholders') && $data->{'placeholders'} === null) {
            $object->setPlaceholders(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getSignerIndex() !== null) {
            $data->{'signer_index'} = $object->getSignerIndex();
        } else {
            $data->{'signer_index'} = null;
        }
        if ($object->getNeedsToSign() !== null) {
            $data->{'needs_to_sign'} = $object->getNeedsToSign();
        } else {
            $data->{'needs_to_sign'} = null;
        }
        if ($object->getApproveOnly() !== null) {
            $data->{'approve_only'} = $object->getApproveOnly();
        } else {
            $data->{'approve_only'} = null;
        }
        if ($object->getNotifyOnly() !== null) {
            $data->{'notify_only'} = $object->getNotifyOnly();
        } else {
            $data->{'notify_only'} = null;
        }
        if ($object->getInPerson() !== null) {
            $data->{'in_person'} = $object->getInPerson();
        } else {
            $data->{'in_person'} = null;
        }
        if ($object->getOrder() !== null) {
            $data->{'order'} = $object->getOrder();
        } else {
            $data->{'order'} = null;
        }

        return $data;
    }
}
