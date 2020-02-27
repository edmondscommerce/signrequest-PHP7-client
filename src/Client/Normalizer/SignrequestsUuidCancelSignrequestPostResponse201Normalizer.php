<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use SignRequest\Client\Model\SignrequestsUuidCancelSignrequestPostResponse201;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class SignrequestsUuidCancelSignrequestPostResponse201Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\SignrequestsUuidCancelSignrequestPostResponse201';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\SignrequestsUuidCancelSignrequestPostResponse201';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new SignrequestsUuidCancelSignrequestPostResponse201();
        if (property_exists($data, 'detail')) {
            $object->setDetail($data->{'detail'});
        }
        if (property_exists($data, 'cancelled')) {
            $object->setCancelled($data->{'cancelled'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getDetail() !== null) {
            $data->{'detail'} = $object->getDetail();
        }
        if ($object->getCancelled() !== null) {
            $data->{'cancelled'} = $object->getCancelled();
        }

        return $data;
    }
}
