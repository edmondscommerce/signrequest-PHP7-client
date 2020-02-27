<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use SignRequest\Client\Model\InlineSignRequest;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class InlineSignRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\InlineSignRequest';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\InlineSignRequest';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new InlineSignRequest();
        if (property_exists($data, 'from_email')) {
            $object->setFromEmail($data->{'from_email'});
        }
        if (property_exists($data, 'from_email_name')) {
            $object->setFromEmailName($data->{'from_email_name'});
        }
        if (property_exists($data, 'is_being_prepared') && $data->{'is_being_prepared'} !== null) {
            $object->setIsBeingPrepared($data->{'is_being_prepared'});
        } elseif (property_exists($data, 'is_being_prepared') && $data->{'is_being_prepared'} === null) {
            $object->setIsBeingPrepared(null);
        }
        if (property_exists($data, 'prepare_url')) {
            $object->setPrepareUrl($data->{'prepare_url'});
        }
        if (property_exists($data, 'redirect_url')) {
            $object->setRedirectUrl($data->{'redirect_url'});
        }
        if (property_exists($data, 'redirect_url_declined')) {
            $object->setRedirectUrlDeclined($data->{'redirect_url_declined'});
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
        if (property_exists($data, 'subject')) {
            $object->setSubject($data->{'subject'});
        }
        if (property_exists($data, 'message')) {
            $object->setMessage($data->{'message'});
        }
        if (property_exists($data, 'who')) {
            $object->setWho($data->{'who'});
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

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        return new stdClass();
    }
}
