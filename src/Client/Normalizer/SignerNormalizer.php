<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use DateTime;
use stdClass;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class SignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\Signer';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\Signer';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \SignRequest\Client\Model\Signer();
        if (property_exists($data, 'email')) {
            $object->setEmail($data->{'email'});
        }
        if (property_exists($data, 'display_name')) {
            $object->setDisplayName($data->{'display_name'});
        }
        if (property_exists($data, 'first_name')) {
            $object->setFirstName($data->{'first_name'});
        }
        if (property_exists($data, 'last_name')) {
            $object->setLastName($data->{'last_name'});
        }
        if (property_exists($data, 'email_viewed')) {
            $object->setEmailViewed($data->{'email_viewed'});
        }
        if (property_exists($data, 'viewed')) {
            $object->setViewed($data->{'viewed'});
        }
        if (property_exists($data, 'signed')) {
            $object->setSigned($data->{'signed'});
        }
        if (property_exists($data, 'downloaded')) {
            $object->setDownloaded($data->{'downloaded'});
        }
        if (property_exists($data, 'signed_on')) {
            $object->setSignedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'signed_on'}));
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
        if (property_exists($data, 'language') && $data->{'language'} !== null) {
            $object->setLanguage($data->{'language'});
        } elseif (property_exists($data, 'language') && $data->{'language'} === null) {
            $object->setLanguage(null);
        }
        if (property_exists($data, 'force_language')) {
            $object->setForceLanguage($data->{'force_language'});
        }
        if (property_exists($data, 'emailed')) {
            $object->setEmailed($data->{'emailed'});
        }
        if (property_exists($data, 'verify_phone_number') && $data->{'verify_phone_number'} !== null) {
            $object->setVerifyPhoneNumber($data->{'verify_phone_number'});
        } elseif (property_exists($data, 'verify_phone_number') && $data->{'verify_phone_number'} === null) {
            $object->setVerifyPhoneNumber(null);
        }
        if (property_exists($data, 'verify_bank_account') && $data->{'verify_bank_account'} !== null) {
            $object->setVerifyBankAccount($data->{'verify_bank_account'});
        } elseif (property_exists($data, 'verify_bank_account') && $data->{'verify_bank_account'} === null) {
            $object->setVerifyBankAccount(null);
        }
        if (property_exists($data, 'declined')) {
            $object->setDeclined($data->{'declined'});
        }
        if (property_exists($data, 'declined_on')) {
            $object->setDeclinedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'declined_on'}));
        }
        if (property_exists($data, 'forwarded')) {
            $object->setForwarded($data->{'forwarded'});
        }
        if (property_exists($data, 'forwarded_on')) {
            $object->setForwardedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'forwarded_on'}));
        }
        if (property_exists($data, 'forwarded_to_email')) {
            $object->setForwardedToEmail($data->{'forwarded_to_email'});
        }
        if (property_exists($data, 'forwarded_reason')) {
            $object->setForwardedReason($data->{'forwarded_reason'});
        }
        if (property_exists($data, 'message')) {
            $object->setMessage($data->{'message'});
        }
        if (property_exists($data, 'embed_url_user_id') && $data->{'embed_url_user_id'} !== null) {
            $object->setEmbedUrlUserId($data->{'embed_url_user_id'});
        } elseif (property_exists($data, 'embed_url_user_id') && $data->{'embed_url_user_id'} === null) {
            $object->setEmbedUrlUserId(null);
        }
        if (property_exists($data, 'inputs')) {
            $values = [];
            foreach ($data->{'inputs'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\SignerInputs', 'json', $context);
            }
            $object->setInputs($values);
        }
        if (property_exists($data, 'use_stamp_for_approve_only') && $data->{'use_stamp_for_approve_only'} !== null) {
            $object->setUseStampForApproveOnly($data->{'use_stamp_for_approve_only'});
        } elseif (property_exists($data, 'use_stamp_for_approve_only') && $data->{'use_stamp_for_approve_only'} === null) {
            $object->setUseStampForApproveOnly(null);
        }
        if (property_exists($data, 'embed_url')) {
            $object->setEmbedUrl($data->{'embed_url'});
        }
        if (property_exists($data, 'attachments')) {
            $values_1 = [];
            foreach ($data->{'attachments'} as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'SignRequest\\Client\\Model\\SignerAttachment', 'json', $context);
            }
            $object->setAttachments($values_1);
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
        if (property_exists($data, 'after_document')) {
            $object->setAfterDocument($data->{'after_document'});
        }
        if (property_exists($data, 'integrations')) {
            $values_2 = [];
            foreach ($data->{'integrations'} as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'SignRequest\\Client\\Model\\InlineDocumentSignerIntegrationData', 'json', $context);
            }
            $object->setIntegrations($values_2);
        }
        if (property_exists($data, 'password')) {
            $object->setPassword($data->{'password'});
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getEmail() !== null) {
            $data->{'email'} = $object->getEmail();
        }
        if ($object->getFirstName() !== null) {
            $data->{'first_name'} = $object->getFirstName();
        }
        if ($object->getLastName() !== null) {
            $data->{'last_name'} = $object->getLastName();
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
        $data->{'language'} = $object->getLanguage();
        if ($object->getForceLanguage() !== null) {
            $data->{'force_language'} = $object->getForceLanguage();
        }
        $data->{'verify_phone_number'}        = $object->getVerifyPhoneNumber();
        $data->{'verify_bank_account'}        = $object->getVerifyBankAccount();
        $data->{'embed_url_user_id'}          = $object->getEmbedUrlUserId();
        $data->{'use_stamp_for_approve_only'} = $object->getUseStampForApproveOnly();
        $data->{'redirect_url'}               = $object->getRedirectUrl();
        $data->{'redirect_url_declined'}      = $object->getRedirectUrlDeclined();
        if ($object->getAfterDocument() !== null) {
            $data->{'after_document'} = $object->getAfterDocument();
        }
        if ($object->getIntegrations() !== null) {
            $values = [];
            foreach ($object->getIntegrations() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'integrations'} = $values;
        }
        if ($object->getPassword() !== null) {
            $data->{'password'} = $object->getPassword();
        }

        return $data;
    }
}
