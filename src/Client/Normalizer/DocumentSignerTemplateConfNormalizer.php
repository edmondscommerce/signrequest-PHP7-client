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
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\DocumentSignerTemplateConf();
        if (property_exists($data, 'signer_index')) {
            $object->setSignerIndex($data->{'signer_index'});
        }
        if (property_exists($data, 'needs_to_sign')) {
            $object->setNeedsToSign($data->{'needs_to_sign'});
        }
        if (property_exists($data, 'approve_only')) {
            $object->setApproveOnly($data->{'approve_only'});
        }
        if (property_exists($data, 'notify_only')) {
            $object->setNotifyOnly($data->{'notify_only'});
        }
        if (property_exists($data, 'in_person')) {
            $object->setInPerson($data->{'in_person'});
        }
        if (property_exists($data, 'order')) {
            $object->setOrder($data->{'order'});
        }
        if (property_exists($data, 'placeholders')) {
            $values = [];
            foreach ($data->{'placeholders'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\Placeholder', 'json', $context);
            }
            $object->setPlaceholders($values);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getSignerIndex() !== null) {
            $data->{'signer_index'} = $object->getSignerIndex();
        }
        if ($object->getNeedsToSign() !== null) {
            $data->{'needs_to_sign'} = $object->getNeedsToSign();
        }
        if ($object->getApproveOnly() !== null) {
            $data->{'approve_only'} = $object->getApproveOnly();
        }
        if ($object->getNotifyOnly() !== null) {
            $data->{'notify_only'} = $object->getNotifyOnly();
        }
        if ($object->getInPerson() !== null) {
            $data->{'in_person'} = $object->getInPerson();
        }
        if ($object->getOrder() !== null) {
            $data->{'order'} = $object->getOrder();
        }

        return $data;
    }
}
