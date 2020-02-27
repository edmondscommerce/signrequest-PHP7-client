<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use SignRequest\Client\Model\DocumentSearch;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class DocumentSearchNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\DocumentSearch';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\DocumentSearch';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new DocumentSearch();
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'created')) {
            $object->setCreated(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'created'}));
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'who')) {
            $object->setWho($data->{'who'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'autocomplete')) {
            $object->setAutocomplete($data->{'autocomplete'});
        }
        if (property_exists($data, 'from_email')) {
            $object->setFromEmail($data->{'from_email'});
        }
        if (property_exists($data, 'nr_extra_docs')) {
            $object->setNrExtraDocs($data->{'nr_extra_docs'});
        }
        if (property_exists($data, 'signer_emails')) {
            $values = [];
            foreach ($data->{'signer_emails'} as $value) {
                $values[] = $value;
            }
            $object->setSignerEmails($values);
        }
        if (property_exists($data, 'status_display')) {
            $object->setStatusDisplay($data->{'status_display'});
        }
        if (property_exists($data, 'created_timestamp')) {
            $object->setCreatedTimestamp($data->{'created_timestamp'});
        }
        if (property_exists($data, 'finished_on_timestamp')) {
            $object->setFinishedOnTimestamp($data->{'finished_on_timestamp'});
        }
        if (property_exists($data, 'parent_doc')) {
            $object->setParentDoc($data->{'parent_doc'});
        }
        if (property_exists($data, 'finished_on')) {
            $object->setFinishedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'finished_on'}));
        }
        if (property_exists($data, 'subdomain')) {
            $object->setSubdomain($data->{'subdomain'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getStatus() !== null) {
            $data->{'status'} = $object->getStatus();
        }
        if ($object->getWho() !== null) {
            $data->{'who'} = $object->getWho();
        }
        if ($object->getAutocomplete() !== null) {
            $data->{'autocomplete'} = $object->getAutocomplete();
        }
        if ($object->getFromEmail() !== null) {
            $data->{'from_email'} = $object->getFromEmail();
        }
        if ($object->getNrExtraDocs() !== null) {
            $data->{'nr_extra_docs'} = $object->getNrExtraDocs();
        }

        return $data;
    }
}
