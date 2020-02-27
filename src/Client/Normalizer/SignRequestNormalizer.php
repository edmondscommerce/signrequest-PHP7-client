<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use SignRequest\Client\Model\SignRequest;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class SignRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\SignRequest';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\SignRequest';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new SignRequest();
        if (property_exists($data, 'from_email')) {
            $object->setFromEmail($data->{'from_email'});
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
        if (property_exists($data, 'prepare_url')) {
            $object->setPrepareUrl($data->{'prepare_url'});
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
        if (property_exists($data, 'required_attachments')) {
            $values = [];
            foreach ($data->{'required_attachments'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\RequiredAttachment', 'json', $context);
            }
            $object->setRequiredAttachments($values);
        }
        if (property_exists($data, 'disable_attachments')) {
            $object->setDisableAttachments($data->{'disable_attachments'});
        }
        if (property_exists($data, 'disable_text_signatures')) {
            $object->setDisableTextSignatures($data->{'disable_text_signatures'});
        }
        if (property_exists($data, 'disable_text')) {
            $object->setDisableText($data->{'disable_text'});
        }
        if (property_exists($data, 'disable_date')) {
            $object->setDisableDate($data->{'disable_date'});
        }
        if (property_exists($data, 'disable_emails')) {
            $object->setDisableEmails($data->{'disable_emails'});
        }
        if (property_exists($data, 'disable_upload_signatures')) {
            $object->setDisableUploadSignatures($data->{'disable_upload_signatures'});
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
        if (property_exists($data, 'send_reminders')) {
            $object->setSendReminders($data->{'send_reminders'});
        }
        if (property_exists($data, 'signers')) {
            $values_1 = [];
            foreach ($data->{'signers'} as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'SignRequest\\Client\\Model\\Signer', 'json', $context);
            }
            $object->setSigners($values_1);
        }
        if (property_exists($data, 'uuid')) {
            $object->setUuid($data->{'uuid'});
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'document')) {
            $object->setDocument($data->{'document'});
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

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getFromEmail() !== null) {
            $data->{'from_email'} = $object->getFromEmail();
        }
        $data->{'from_email_name'}       = $object->getFromEmailName();
        $data->{'is_being_prepared'}     = $object->getIsBeingPrepared();
        $data->{'redirect_url'}          = $object->getRedirectUrl();
        $data->{'redirect_url_declined'} = $object->getRedirectUrlDeclined();
        if ($object->getRequiredAttachments() !== null) {
            $values = [];
            foreach ($object->getRequiredAttachments() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'required_attachments'} = $values;
        }
        if ($object->getDisableAttachments() !== null) {
            $data->{'disable_attachments'} = $object->getDisableAttachments();
        }
        if ($object->getDisableTextSignatures() !== null) {
            $data->{'disable_text_signatures'} = $object->getDisableTextSignatures();
        }
        if ($object->getDisableText() !== null) {
            $data->{'disable_text'} = $object->getDisableText();
        }
        if ($object->getDisableDate() !== null) {
            $data->{'disable_date'} = $object->getDisableDate();
        }
        if ($object->getDisableEmails() !== null) {
            $data->{'disable_emails'} = $object->getDisableEmails();
        }
        if ($object->getDisableUploadSignatures() !== null) {
            $data->{'disable_upload_signatures'} = $object->getDisableUploadSignatures();
        }
        $data->{'disable_blockchain_proof'}         = $object->getDisableBlockchainProof();
        $data->{'text_message_verification_locked'} = $object->getTextMessageVerificationLocked();
        $data->{'subject'}                          = $object->getSubject();
        $data->{'message'}                          = $object->getMessage();
        $data->{'who'}                              = $object->getWho();
        if ($object->getSendReminders() !== null) {
            $data->{'send_reminders'} = $object->getSendReminders();
        }
        if ($object->getSigners() !== null) {
            $values_1 = [];
            foreach ($object->getSigners() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data->{'signers'} = $values_1;
        }
        if ($object->getDocument() !== null) {
            $data->{'document'} = $object->getDocument();
        }
        $data->{'integration'}      = $object->getIntegration();
        $data->{'integration_data'} = $object->getIntegrationData();

        return $data;
    }
}
