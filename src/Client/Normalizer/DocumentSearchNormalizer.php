<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use stdClass;
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
            return null;
        }
        $object = new \SignRequest\Client\Model\DocumentSearch();
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'created') && $data->{'created'} !== null) {
            $object->setCreated(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'created'}));
        } elseif (property_exists($data, 'created') && $data->{'created'} === null) {
            $object->setCreated(null);
        }
        if (property_exists($data, 'status') && $data->{'status'} !== null) {
            $object->setStatus($data->{'status'});
        } elseif (property_exists($data, 'status') && $data->{'status'} === null) {
            $object->setStatus(null);
        }
        if (property_exists($data, 'who') && $data->{'who'} !== null) {
            $object->setWho($data->{'who'});
        } elseif (property_exists($data, 'who') && $data->{'who'} === null) {
            $object->setWho(null);
        }
        if (property_exists($data, 'name') && $data->{'name'} !== null) {
            $object->setName($data->{'name'});
        } elseif (property_exists($data, 'name') && $data->{'name'} === null) {
            $object->setName(null);
        }
        if (property_exists($data, 'autocomplete') && $data->{'autocomplete'} !== null) {
            $object->setAutocomplete($data->{'autocomplete'});
        } elseif (property_exists($data, 'autocomplete') && $data->{'autocomplete'} === null) {
            $object->setAutocomplete(null);
        }
        if (property_exists($data, 'from_email') && $data->{'from_email'} !== null) {
            $object->setFromEmail($data->{'from_email'});
        } elseif (property_exists($data, 'from_email') && $data->{'from_email'} === null) {
            $object->setFromEmail(null);
        }
        if (property_exists($data, 'nr_extra_docs') && $data->{'nr_extra_docs'} !== null) {
            $object->setNrExtraDocs($data->{'nr_extra_docs'});
        } elseif (property_exists($data, 'nr_extra_docs') && $data->{'nr_extra_docs'} === null) {
            $object->setNrExtraDocs(null);
        }
        if (property_exists($data, 'signer_emails') && $data->{'signer_emails'} !== null) {
            $values = [];
            foreach ($data->{'signer_emails'} as $value) {
                $values[] = $value;
            }
            $object->setSignerEmails($values);
        } elseif (property_exists($data, 'signer_emails') && $data->{'signer_emails'} === null) {
            $object->setSignerEmails(null);
        }
        if (property_exists($data, 'status_display') && $data->{'status_display'} !== null) {
            $object->setStatusDisplay($data->{'status_display'});
        } elseif (property_exists($data, 'status_display') && $data->{'status_display'} === null) {
            $object->setStatusDisplay(null);
        }
        if (property_exists($data, 'created_timestamp') && $data->{'created_timestamp'} !== null) {
            $object->setCreatedTimestamp($data->{'created_timestamp'});
        } elseif (property_exists($data, 'created_timestamp') && $data->{'created_timestamp'} === null) {
            $object->setCreatedTimestamp(null);
        }
        if (property_exists($data, 'finished_on_timestamp') && $data->{'finished_on_timestamp'} !== null) {
            $object->setFinishedOnTimestamp($data->{'finished_on_timestamp'});
        } elseif (property_exists($data, 'finished_on_timestamp') && $data->{'finished_on_timestamp'} === null) {
            $object->setFinishedOnTimestamp(null);
        }
        if (property_exists($data, 'parent_doc') && $data->{'parent_doc'} !== null) {
            $object->setParentDoc($data->{'parent_doc'});
        } elseif (property_exists($data, 'parent_doc') && $data->{'parent_doc'} === null) {
            $object->setParentDoc(null);
        }
        if (property_exists($data, 'finished_on') && $data->{'finished_on'} !== null) {
            $object->setFinishedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'finished_on'}));
        } elseif (property_exists($data, 'finished_on') && $data->{'finished_on'} === null) {
            $object->setFinishedOn(null);
        }
        if (property_exists($data, 'subdomain') && $data->{'subdomain'} !== null) {
            $object->setSubdomain($data->{'subdomain'});
        } elseif (property_exists($data, 'subdomain') && $data->{'subdomain'} === null) {
            $object->setSubdomain(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getStatus() !== null) {
            $data->{'status'} = $object->getStatus();
        } else {
            $data->{'status'} = null;
        }
        if ($object->getWho() !== null) {
            $data->{'who'} = $object->getWho();
        } else {
            $data->{'who'} = null;
        }
        if ($object->getAutocomplete() !== null) {
            $data->{'autocomplete'} = $object->getAutocomplete();
        } else {
            $data->{'autocomplete'} = null;
        }
        if ($object->getFromEmail() !== null) {
            $data->{'from_email'} = $object->getFromEmail();
        } else {
            $data->{'from_email'} = null;
        }
        if ($object->getNrExtraDocs() !== null) {
            $data->{'nr_extra_docs'} = $object->getNrExtraDocs();
        } else {
            $data->{'nr_extra_docs'} = null;
        }

        return $data;
    }
}
