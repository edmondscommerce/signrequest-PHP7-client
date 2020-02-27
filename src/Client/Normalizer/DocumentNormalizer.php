<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use SignRequest\Client\Model\Document;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class DocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\Document';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\Document';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new Document();
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'team')) {
            $object->setTeam($this->denormalizer->denormalize($data->{'team'}, 'SignRequest\\Client\\Model\\DocumentTeam', 'json', $context));
        }
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'user')) {
            $object->setUser($this->denormalizer->denormalize($data->{'user'}, 'SignRequest\\Client\\Model\\User', 'json', $context));
        }
        if (property_exists($data, 'file_as_pdf')) {
            $object->setFileAsPdf($data->{'file_as_pdf'});
        }
        if (property_exists($data, 'name') && $data->{'name'} !== null) {
            $object->setName($data->{'name'});
        } elseif (property_exists($data, 'name') && $data->{'name'} === null) {
            $object->setName(null);
        }
        if (property_exists($data, 'external_id') && $data->{'external_id'} !== null) {
            $object->setExternalId($data->{'external_id'});
        } elseif (property_exists($data, 'external_id') && $data->{'external_id'} === null) {
            $object->setExternalId(null);
        }
        if (property_exists($data, 'frontend_id') && $data->{'frontend_id'} !== null) {
            $object->setFrontendId($data->{'frontend_id'});
        } elseif (property_exists($data, 'frontend_id') && $data->{'frontend_id'} === null) {
            $object->setFrontendId(null);
        }
        if (property_exists($data, 'file') && $data->{'file'} !== null) {
            $object->setFile($data->{'file'});
        } elseif (property_exists($data, 'file') && $data->{'file'} === null) {
            $object->setFile(null);
        }
        if (property_exists($data, 'file_from_url') && $data->{'file_from_url'} !== null) {
            $object->setFileFromUrl($data->{'file_from_url'});
        } elseif (property_exists($data, 'file_from_url') && $data->{'file_from_url'} === null) {
            $object->setFileFromUrl(null);
        }
        if (property_exists($data, 'events_callback_url') && $data->{'events_callback_url'} !== null) {
            $object->setEventsCallbackUrl($data->{'events_callback_url'});
        } elseif (property_exists($data, 'events_callback_url') && $data->{'events_callback_url'} === null) {
            $object->setEventsCallbackUrl(null);
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
        if (property_exists($data, 'template') && $data->{'template'} !== null) {
            $object->setTemplate($data->{'template'});
        } elseif (property_exists($data, 'template') && $data->{'template'} === null) {
            $object->setTemplate(null);
        }
        if (property_exists($data, 'prefill_tags')) {
            $values = [];
            foreach ($data->{'prefill_tags'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\InlinePrefillTags', 'json', $context);
            }
            $object->setPrefillTags($values);
        }
        if (property_exists($data, 'integrations')) {
            $values_1 = [];
            foreach ($data->{'integrations'} as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'SignRequest\\Client\\Model\\InlineIntegrationData', 'json', $context);
            }
            $object->setIntegrations($values_1);
        }
        if (property_exists($data, 'file_from_sf')) {
            $object->setFileFromSf($this->denormalizer->denormalize($data->{'file_from_sf'}, 'SignRequest\\Client\\Model\\FileFromSf', 'json', $context));
        }
        if (property_exists($data, 'auto_delete_days') && $data->{'auto_delete_days'} !== null) {
            $object->setAutoDeleteDays($data->{'auto_delete_days'});
        } elseif (property_exists($data, 'auto_delete_days') && $data->{'auto_delete_days'} === null) {
            $object->setAutoDeleteDays(null);
        }
        if (property_exists($data, 'auto_expire_days') && $data->{'auto_expire_days'} !== null) {
            $object->setAutoExpireDays($data->{'auto_expire_days'});
        } elseif (property_exists($data, 'auto_expire_days') && $data->{'auto_expire_days'} === null) {
            $object->setAutoExpireDays(null);
        }
        if (property_exists($data, 'pdf')) {
            $object->setPdf($data->{'pdf'});
        }
        if (property_exists($data, 'status')) {
            $object->setStatus($data->{'status'});
        }
        if (property_exists($data, 'signrequest')) {
            $object->setSignrequest($this->denormalizer->denormalize($data->{'signrequest'}, 'SignRequest\\Client\\Model\\DocumentSignrequest', 'json', $context));
        }
        if (property_exists($data, 'api_used')) {
            $object->setApiUsed($data->{'api_used'});
        }
        if (property_exists($data, 'signing_log')) {
            $object->setSigningLog($this->denormalizer->denormalize($data->{'signing_log'}, 'SignRequest\\Client\\Model\\DocumentSigningLog', 'json', $context));
        }
        if (property_exists($data, 'security_hash')) {
            $object->setSecurityHash($data->{'security_hash'});
        }
        if (property_exists($data, 'attachments')) {
            $values_2 = [];
            foreach ($data->{'attachments'} as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'SignRequest\\Client\\Model\\DocumentAttachment', 'json', $context);
            }
            $object->setAttachments($values_2);
        }
        if (property_exists($data, 'auto_delete_after')) {
            $object->setAutoDeleteAfter(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'auto_delete_after'}));
        }
        if (property_exists($data, 'sandbox') && $data->{'sandbox'} !== null) {
            $object->setSandbox($data->{'sandbox'});
        } elseif (property_exists($data, 'sandbox') && $data->{'sandbox'} === null) {
            $object->setSandbox(null);
        }
        if (property_exists($data, 'auto_expire_after')) {
            $object->setAutoExpireAfter(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'auto_expire_after'}));
        }
        if (property_exists($data, 'processing')) {
            $object->setProcessing($data->{'processing'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getUser() !== null) {
            $data->{'user'} = $this->normalizer->normalize($object->getUser(), 'json', $context);
        }
        $data->{'name'}                   = $object->getName();
        $data->{'external_id'}            = $object->getExternalId();
        $data->{'frontend_id'}            = $object->getFrontendId();
        $data->{'file_from_url'}          = $object->getFileFromUrl();
        $data->{'events_callback_url'}    = $object->getEventsCallbackUrl();
        $data->{'file_from_content'}      = $object->getFileFromContent();
        $data->{'file_from_content_name'} = $object->getFileFromContentName();
        $data->{'template'}               = $object->getTemplate();
        if ($object->getPrefillTags() !== null) {
            $values = [];
            foreach ($object->getPrefillTags() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'prefill_tags'} = $values;
        }
        if ($object->getIntegrations() !== null) {
            $values_1 = [];
            foreach ($object->getIntegrations() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data->{'integrations'} = $values_1;
        }
        if ($object->getFileFromSf() !== null) {
            $data->{'file_from_sf'} = $this->normalizer->normalize($object->getFileFromSf(), 'json', $context);
        }
        $data->{'auto_delete_days'} = $object->getAutoDeleteDays();
        $data->{'auto_expire_days'} = $object->getAutoExpireDays();

        return $data;
    }
}
