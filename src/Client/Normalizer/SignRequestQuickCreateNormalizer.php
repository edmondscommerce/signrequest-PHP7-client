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

final class SignRequestQuickCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\SignRequestQuickCreate';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\SignRequestQuickCreate';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\SignRequestQuickCreate();
        if (property_exists($data, 'from_email') && $data->{'from_email'} !== null) {
            $object->setFromEmail($data->{'from_email'});
        } elseif (property_exists($data, 'from_email') && $data->{'from_email'} === null) {
            $object->setFromEmail(null);
        }
        if (property_exists($data, 'from_email_name') && $data->{'from_email_name'} !== null) {
            $object->setFromEmailName($data->{'from_email_name'});
        } elseif (property_exists($data, 'from_email_name') && $data->{'from_email_name'} === null) {
            $object->setFromEmailName(null);
        }
        if (property_exists($data, 'is_being_prepared') && $data->{'is_being_prepared'} !== null) {
            $object->setIsBeingPrepared($data->{'is_being_prepared'});
        } elseif (property_exists($data, 'is_being_prepared') && $data->{'is_being_prepared'} === null) {
            $object->setIsBeingPrepared(null);
        }
        if (property_exists($data, 'prepare_url') && $data->{'prepare_url'} !== null) {
            $object->setPrepareUrl($data->{'prepare_url'});
        } elseif (property_exists($data, 'prepare_url') && $data->{'prepare_url'} === null) {
            $object->setPrepareUrl(null);
        }
        if (property_exists($data, 'redirect_url') && $data->{'redirect_url'} !== null) {
            $object->setRedirectUrl($data->{'redirect_url'});
        } elseif (property_exists($data, 'redirect_url') && $data->{'redirect_url'} === null) {
            $object->setRedirectUrl(null);
        }
        if (property_exists($data, 'redirect_url_declined') && $data->{'redirect_url_declined'} !== null) {
            $object->setRedirectUrlDeclined($data->{'redirect_url_declined'});
        } elseif (property_exists($data, 'redirect_url_declined') && $data->{'redirect_url_declined'} === null) {
            $object->setRedirectUrlDeclined(null);
        }
        if (property_exists($data, 'required_attachments') && $data->{'required_attachments'} !== null) {
            $values = [];
            foreach ($data->{'required_attachments'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\RequiredAttachment', 'json', $context);
            }
            $object->setRequiredAttachments($values);
        } elseif (property_exists($data, 'required_attachments') && $data->{'required_attachments'} === null) {
            $object->setRequiredAttachments(null);
        }
        if (property_exists($data, 'disable_attachments') && $data->{'disable_attachments'} !== null) {
            $object->setDisableAttachments($data->{'disable_attachments'});
        } elseif (property_exists($data, 'disable_attachments') && $data->{'disable_attachments'} === null) {
            $object->setDisableAttachments(null);
        }
        if (property_exists($data, 'disable_text_signatures') && $data->{'disable_text_signatures'} !== null) {
            $object->setDisableTextSignatures($data->{'disable_text_signatures'});
        } elseif (property_exists($data, 'disable_text_signatures') && $data->{'disable_text_signatures'} === null) {
            $object->setDisableTextSignatures(null);
        }
        if (property_exists($data, 'disable_text') && $data->{'disable_text'} !== null) {
            $object->setDisableText($data->{'disable_text'});
        } elseif (property_exists($data, 'disable_text') && $data->{'disable_text'} === null) {
            $object->setDisableText(null);
        }
        if (property_exists($data, 'disable_date') && $data->{'disable_date'} !== null) {
            $object->setDisableDate($data->{'disable_date'});
        } elseif (property_exists($data, 'disable_date') && $data->{'disable_date'} === null) {
            $object->setDisableDate(null);
        }
        if (property_exists($data, 'disable_emails') && $data->{'disable_emails'} !== null) {
            $object->setDisableEmails($data->{'disable_emails'});
        } elseif (property_exists($data, 'disable_emails') && $data->{'disable_emails'} === null) {
            $object->setDisableEmails(null);
        }
        if (property_exists($data, 'disable_upload_signatures') && $data->{'disable_upload_signatures'} !== null) {
            $object->setDisableUploadSignatures($data->{'disable_upload_signatures'});
        } elseif (property_exists($data, 'disable_upload_signatures') && $data->{'disable_upload_signatures'} === null) {
            $object->setDisableUploadSignatures(null);
        }
        if (property_exists($data, 'disable_blockchain_proof') && $data->{'disable_blockchain_proof'} !== null) {
            $object->setDisableBlockchainProof($data->{'disable_blockchain_proof'});
        } elseif (property_exists($data, 'disable_blockchain_proof') && $data->{'disable_blockchain_proof'} === null) {
            $object->setDisableBlockchainProof(null);
        }
        if (property_exists($data, 'text_message_verification_locked') && $data->{'text_message_verification_locked'} !== null) {
            $object->setTextMessageVerificationLocked($data->{'text_message_verification_locked'});
        } elseif (property_exists($data, 'text_message_verification_locked') && $data->{'text_message_verification_locked'} === null) {
            $object->setTextMessageVerificationLocked(null);
        }
        if (property_exists($data, 'subject') && $data->{'subject'} !== null) {
            $object->setSubject($data->{'subject'});
        } elseif (property_exists($data, 'subject') && $data->{'subject'} === null) {
            $object->setSubject(null);
        }
        if (property_exists($data, 'message') && $data->{'message'} !== null) {
            $object->setMessage($data->{'message'});
        } elseif (property_exists($data, 'message') && $data->{'message'} === null) {
            $object->setMessage(null);
        }
        if (property_exists($data, 'who') && $data->{'who'} !== null) {
            $object->setWho($data->{'who'});
        } elseif (property_exists($data, 'who') && $data->{'who'} === null) {
            $object->setWho(null);
        }
        if (property_exists($data, 'send_reminders') && $data->{'send_reminders'} !== null) {
            $object->setSendReminders($data->{'send_reminders'});
        } elseif (property_exists($data, 'send_reminders') && $data->{'send_reminders'} === null) {
            $object->setSendReminders(null);
        }
        if (property_exists($data, 'signers') && $data->{'signers'} !== null) {
            $values_1 = [];
            foreach ($data->{'signers'} as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'SignRequest\\Client\\Model\\Signer', 'json', $context);
            }
            $object->setSigners($values_1);
        } elseif (property_exists($data, 'signers') && $data->{'signers'} === null) {
            $object->setSigners(null);
        }
        if (property_exists($data, 'uuid') && $data->{'uuid'} !== null) {
            $object->setUuid($data->{'uuid'});
        } elseif (property_exists($data, 'uuid') && $data->{'uuid'} === null) {
            $object->setUuid(null);
        }
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
        if (property_exists($data, 'document') && $data->{'document'} !== null) {
            $object->setDocument($data->{'document'});
        } elseif (property_exists($data, 'document') && $data->{'document'} === null) {
            $object->setDocument(null);
        }
        if (property_exists($data, 'integration') && $data->{'integration'} !== null) {
            $object->setIntegration($data->{'integration'});
        } elseif (property_exists($data, 'integration') && $data->{'integration'} === null) {
            $object->setIntegration(null);
        }
        if (property_exists($data, 'integration_data') && $data->{'integration_data'} !== null) {
            $object->setIntegrationData($data->{'integration_data'});
        } elseif (property_exists($data, 'integration_data') && $data->{'integration_data'} === null) {
            $object->setIntegrationData(null);
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
            $values_2 = [];
            foreach ($data->{'prefill_tags'} as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'SignRequest\\Client\\Model\\InlinePrefillTags', 'json', $context);
            }
            $object->setPrefillTags($values_2);
        } elseif (property_exists($data, 'prefill_tags') && $data->{'prefill_tags'} === null) {
            $object->setPrefillTags(null);
        }
        if (property_exists($data, 'integrations') && $data->{'integrations'} !== null) {
            $values_3 = [];
            foreach ($data->{'integrations'} as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'SignRequest\\Client\\Model\\InlineIntegrationData', 'json', $context);
            }
            $object->setIntegrations($values_3);
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

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getFromEmail() !== null) {
            $data->{'from_email'} = $object->getFromEmail();
        } else {
            $data->{'from_email'} = null;
        }
        if ($object->getFromEmailName() !== null) {
            $data->{'from_email_name'} = $object->getFromEmailName();
        } else {
            $data->{'from_email_name'} = null;
        }
        if ($object->getIsBeingPrepared() !== null) {
            $data->{'is_being_prepared'} = $object->getIsBeingPrepared();
        } else {
            $data->{'is_being_prepared'} = null;
        }
        if ($object->getRedirectUrl() !== null) {
            $data->{'redirect_url'} = $object->getRedirectUrl();
        } else {
            $data->{'redirect_url'} = null;
        }
        if ($object->getRedirectUrlDeclined() !== null) {
            $data->{'redirect_url_declined'} = $object->getRedirectUrlDeclined();
        } else {
            $data->{'redirect_url_declined'} = null;
        }
        if ($object->getRequiredAttachments() !== null) {
            $values = [];
            foreach ($object->getRequiredAttachments() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'required_attachments'} = $values;
        } else {
            $data->{'required_attachments'} = null;
        }
        if ($object->getDisableAttachments() !== null) {
            $data->{'disable_attachments'} = $object->getDisableAttachments();
        } else {
            $data->{'disable_attachments'} = null;
        }
        if ($object->getDisableTextSignatures() !== null) {
            $data->{'disable_text_signatures'} = $object->getDisableTextSignatures();
        } else {
            $data->{'disable_text_signatures'} = null;
        }
        if ($object->getDisableText() !== null) {
            $data->{'disable_text'} = $object->getDisableText();
        } else {
            $data->{'disable_text'} = null;
        }
        if ($object->getDisableDate() !== null) {
            $data->{'disable_date'} = $object->getDisableDate();
        } else {
            $data->{'disable_date'} = null;
        }
        if ($object->getDisableEmails() !== null) {
            $data->{'disable_emails'} = $object->getDisableEmails();
        } else {
            $data->{'disable_emails'} = null;
        }
        if ($object->getDisableUploadSignatures() !== null) {
            $data->{'disable_upload_signatures'} = $object->getDisableUploadSignatures();
        } else {
            $data->{'disable_upload_signatures'} = null;
        }
        if ($object->getDisableBlockchainProof() !== null) {
            $data->{'disable_blockchain_proof'} = $object->getDisableBlockchainProof();
        } else {
            $data->{'disable_blockchain_proof'} = null;
        }
        if ($object->getTextMessageVerificationLocked() !== null) {
            $data->{'text_message_verification_locked'} = $object->getTextMessageVerificationLocked();
        } else {
            $data->{'text_message_verification_locked'} = null;
        }
        if ($object->getSubject() !== null) {
            $data->{'subject'} = $object->getSubject();
        } else {
            $data->{'subject'} = null;
        }
        if ($object->getMessage() !== null) {
            $data->{'message'} = $object->getMessage();
        } else {
            $data->{'message'} = null;
        }
        if ($object->getWho() !== null) {
            $data->{'who'} = $object->getWho();
        } else {
            $data->{'who'} = null;
        }
        if ($object->getSendReminders() !== null) {
            $data->{'send_reminders'} = $object->getSendReminders();
        } else {
            $data->{'send_reminders'} = null;
        }
        if ($object->getSigners() !== null) {
            $values_1 = [];
            foreach ($object->getSigners() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data->{'signers'} = $values_1;
        } else {
            $data->{'signers'} = null;
        }
        if ($object->getIntegration() !== null) {
            $data->{'integration'} = $object->getIntegration();
        } else {
            $data->{'integration'} = null;
        }
        if ($object->getIntegrationData() !== null) {
            $data->{'integration_data'} = $object->getIntegrationData();
        } else {
            $data->{'integration_data'} = null;
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
            $values_2 = [];
            foreach ($object->getPrefillTags() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data->{'prefill_tags'} = $values_2;
        } else {
            $data->{'prefill_tags'} = null;
        }
        if ($object->getIntegrations() !== null) {
            $values_3 = [];
            foreach ($object->getIntegrations() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data->{'integrations'} = $values_3;
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
