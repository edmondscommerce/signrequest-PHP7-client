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
            return null;
        }
        $object = new \SignRequest\Client\Model\Document();
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
        if (property_exists($data, 'team') && $data->{'team'} !== null) {
            $object->setTeam($this->denormalizer->denormalize($data->{'team'}, 'SignRequest\\Client\\Model\\DocumentTeam', 'json', $context));
        } elseif (property_exists($data, 'team') && $data->{'team'} === null) {
            $object->setTeam(null);
        }
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'user') && $data->{'user'} !== null) {
            $object->setUser($this->denormalizer->denormalize($data->{'user'}, 'SignRequest\\Client\\Model\\User', 'json', $context));
        } elseif (property_exists($data, 'user') && $data->{'user'} === null) {
            $object->setUser(null);
        }
        if (property_exists($data, 'file_as_pdf') && $data->{'file_as_pdf'} !== null) {
            $object->setFileAsPdf($data->{'file_as_pdf'});
        } elseif (property_exists($data, 'file_as_pdf') && $data->{'file_as_pdf'} === null) {
            $object->setFileAsPdf(null);
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
        if (property_exists($data, 'prefill_tags') && $data->{'prefill_tags'} !== null) {
            $values = [];
            foreach ($data->{'prefill_tags'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\InlinePrefillTags', 'json', $context);
            }
            $object->setPrefillTags($values);
        } elseif (property_exists($data, 'prefill_tags') && $data->{'prefill_tags'} === null) {
            $object->setPrefillTags(null);
        }
        if (property_exists($data, 'integrations') && $data->{'integrations'} !== null) {
            $values_1 = [];
            foreach ($data->{'integrations'} as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'SignRequest\\Client\\Model\\InlineIntegrationData', 'json', $context);
            }
            $object->setIntegrations($values_1);
        } elseif (property_exists($data, 'integrations') && $data->{'integrations'} === null) {
            $object->setIntegrations(null);
        }
        if (property_exists($data, 'file_from_sf') && $data->{'file_from_sf'} !== null) {
            $object->setFileFromSf($this->denormalizer->denormalize($data->{'file_from_sf'}, 'SignRequest\\Client\\Model\\FileFromSf', 'json', $context));
        } elseif (property_exists($data, 'file_from_sf') && $data->{'file_from_sf'} === null) {
            $object->setFileFromSf(null);
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
        if (property_exists($data, 'pdf') && $data->{'pdf'} !== null) {
            $object->setPdf($data->{'pdf'});
        } elseif (property_exists($data, 'pdf') && $data->{'pdf'} === null) {
            $object->setPdf(null);
        }
        if (property_exists($data, 'status') && $data->{'status'} !== null) {
            $object->setStatus($data->{'status'});
        } elseif (property_exists($data, 'status') && $data->{'status'} === null) {
            $object->setStatus(null);
        }
        if (property_exists($data, 'signrequest') && $data->{'signrequest'} !== null) {
            $object->setSignrequest($this->denormalizer->denormalize($data->{'signrequest'}, 'SignRequest\\Client\\Model\\DocumentSignrequest', 'json', $context));
        } elseif (property_exists($data, 'signrequest') && $data->{'signrequest'} === null) {
            $object->setSignrequest(null);
        }
        if (property_exists($data, 'api_used') && $data->{'api_used'} !== null) {
            $object->setApiUsed($data->{'api_used'});
        } elseif (property_exists($data, 'api_used') && $data->{'api_used'} === null) {
            $object->setApiUsed(null);
        }
        if (property_exists($data, 'signing_log') && $data->{'signing_log'} !== null) {
            $object->setSigningLog($this->denormalizer->denormalize($data->{'signing_log'}, 'SignRequest\\Client\\Model\\DocumentSigningLog', 'json', $context));
        } elseif (property_exists($data, 'signing_log') && $data->{'signing_log'} === null) {
            $object->setSigningLog(null);
        }
        if (property_exists($data, 'security_hash') && $data->{'security_hash'} !== null) {
            $object->setSecurityHash($data->{'security_hash'});
        } elseif (property_exists($data, 'security_hash') && $data->{'security_hash'} === null) {
            $object->setSecurityHash(null);
        }
        if (property_exists($data, 'attachments') && $data->{'attachments'} !== null) {
            $values_2 = [];
            foreach ($data->{'attachments'} as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'SignRequest\\Client\\Model\\DocumentAttachment', 'json', $context);
            }
            $object->setAttachments($values_2);
        } elseif (property_exists($data, 'attachments') && $data->{'attachments'} === null) {
            $object->setAttachments(null);
        }
        if (property_exists($data, 'auto_delete_after') && $data->{'auto_delete_after'} !== null) {
            $object->setAutoDeleteAfter(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'auto_delete_after'}));
        } elseif (property_exists($data, 'auto_delete_after') && $data->{'auto_delete_after'} === null) {
            $object->setAutoDeleteAfter(null);
        }
        if (property_exists($data, 'sandbox') && $data->{'sandbox'} !== null) {
            $object->setSandbox($data->{'sandbox'});
        } elseif (property_exists($data, 'sandbox') && $data->{'sandbox'} === null) {
            $object->setSandbox(null);
        }
        if (property_exists($data, 'auto_expire_after') && $data->{'auto_expire_after'} !== null) {
            $object->setAutoExpireAfter(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'auto_expire_after'}));
        } elseif (property_exists($data, 'auto_expire_after') && $data->{'auto_expire_after'} === null) {
            $object->setAutoExpireAfter(null);
        }
        if (property_exists($data, 'processing') && $data->{'processing'} !== null) {
            $object->setProcessing($data->{'processing'});
        } elseif (property_exists($data, 'processing') && $data->{'processing'} === null) {
            $object->setProcessing(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getUser() !== null) {
            $data->{'user'} = $this->normalizer->normalize($object->getUser(), 'json', $context);
        } else {
            $data->{'user'} = null;
        }
        if ($object->getName() !== null) {
            $data->{'name'} = $object->getName();
        } else {
            $data->{'name'} = null;
        }
        if ($object->getExternalId() !== null) {
            $data->{'external_id'} = $object->getExternalId();
        } else {
            $data->{'external_id'} = null;
        }
        if ($object->getFrontendId() !== null) {
            $data->{'frontend_id'} = $object->getFrontendId();
        } else {
            $data->{'frontend_id'} = null;
        }
        if ($object->getFileFromUrl() !== null) {
            $data->{'file_from_url'} = $object->getFileFromUrl();
        } else {
            $data->{'file_from_url'} = null;
        }
        if ($object->getEventsCallbackUrl() !== null) {
            $data->{'events_callback_url'} = $object->getEventsCallbackUrl();
        } else {
            $data->{'events_callback_url'} = null;
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
        if ($object->getTemplate() !== null) {
            $data->{'template'} = $object->getTemplate();
        } else {
            $data->{'template'} = null;
        }
        if ($object->getPrefillTags() !== null) {
            $values = [];
            foreach ($object->getPrefillTags() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'prefill_tags'} = $values;
        } else {
            $data->{'prefill_tags'} = null;
        }
        if ($object->getIntegrations() !== null) {
            $values_1 = [];
            foreach ($object->getIntegrations() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data->{'integrations'} = $values_1;
        } else {
            $data->{'integrations'} = null;
        }
        if ($object->getFileFromSf() !== null) {
            $data->{'file_from_sf'} = $this->normalizer->normalize($object->getFileFromSf(), 'json', $context);
        } else {
            $data->{'file_from_sf'} = null;
        }
        if ($object->getAutoDeleteDays() !== null) {
            $data->{'auto_delete_days'} = $object->getAutoDeleteDays();
        } else {
            $data->{'auto_delete_days'} = null;
        }
        if ($object->getAutoExpireDays() !== null) {
            $data->{'auto_expire_days'} = $object->getAutoExpireDays();
        } else {
            $data->{'auto_expire_days'} = null;
        }

        return $data;
    }
}
