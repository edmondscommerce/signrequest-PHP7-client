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
            return null;
        }
        $object = new \SignRequest\Client\Model\Signer();
        if (property_exists($data, 'email') && $data->{'email'} !== null) {
            $object->setEmail($data->{'email'});
        } elseif (property_exists($data, 'email') && $data->{'email'} === null) {
            $object->setEmail(null);
        }
        if (property_exists($data, 'display_name') && $data->{'display_name'} !== null) {
            $object->setDisplayName($data->{'display_name'});
        } elseif (property_exists($data, 'display_name') && $data->{'display_name'} === null) {
            $object->setDisplayName(null);
        }
        if (property_exists($data, 'first_name') && $data->{'first_name'} !== null) {
            $object->setFirstName($data->{'first_name'});
        } elseif (property_exists($data, 'first_name') && $data->{'first_name'} === null) {
            $object->setFirstName(null);
        }
        if (property_exists($data, 'last_name') && $data->{'last_name'} !== null) {
            $object->setLastName($data->{'last_name'});
        } elseif (property_exists($data, 'last_name') && $data->{'last_name'} === null) {
            $object->setLastName(null);
        }
        if (property_exists($data, 'email_viewed') && $data->{'email_viewed'} !== null) {
            $object->setEmailViewed($data->{'email_viewed'});
        } elseif (property_exists($data, 'email_viewed') && $data->{'email_viewed'} === null) {
            $object->setEmailViewed(null);
        }
        if (property_exists($data, 'viewed') && $data->{'viewed'} !== null) {
            $object->setViewed($data->{'viewed'});
        } elseif (property_exists($data, 'viewed') && $data->{'viewed'} === null) {
            $object->setViewed(null);
        }
        if (property_exists($data, 'signed') && $data->{'signed'} !== null) {
            $object->setSigned($data->{'signed'});
        } elseif (property_exists($data, 'signed') && $data->{'signed'} === null) {
            $object->setSigned(null);
        }
        if (property_exists($data, 'downloaded') && $data->{'downloaded'} !== null) {
            $object->setDownloaded($data->{'downloaded'});
        } elseif (property_exists($data, 'downloaded') && $data->{'downloaded'} === null) {
            $object->setDownloaded(null);
        }
        if (property_exists($data, 'signed_on') && $data->{'signed_on'} !== null) {
            $object->setSignedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'signed_on'}));
        } elseif (property_exists($data, 'signed_on') && $data->{'signed_on'} === null) {
            $object->setSignedOn(null);
        }
        if (property_exists($data, 'needs_to_sign') && $data->{'needs_to_sign'} !== null) {
            $object->setNeedsToSign($data->{'needs_to_sign'});
        } elseif (property_exists($data, 'needs_to_sign') && $data->{'needs_to_sign'} === null) {
            $object->setNeedsToSign(null);
        }
        if (property_exists($data, 'approve_only') && $data->{'approve_only'} !== null) {
            $object->setApproveOnly($data->{'approve_only'});
        } elseif (property_exists($data, 'approve_only') && $data->{'approve_only'} === null) {
            $object->setApproveOnly(null);
        }
        if (property_exists($data, 'notify_only') && $data->{'notify_only'} !== null) {
            $object->setNotifyOnly($data->{'notify_only'});
        } elseif (property_exists($data, 'notify_only') && $data->{'notify_only'} === null) {
            $object->setNotifyOnly(null);
        }
        if (property_exists($data, 'in_person') && $data->{'in_person'} !== null) {
            $object->setInPerson($data->{'in_person'});
        } elseif (property_exists($data, 'in_person') && $data->{'in_person'} === null) {
            $object->setInPerson(null);
        }
        if (property_exists($data, 'order') && $data->{'order'} !== null) {
            $object->setOrder($data->{'order'});
        } elseif (property_exists($data, 'order') && $data->{'order'} === null) {
            $object->setOrder(null);
        }
        if (property_exists($data, 'language') && $data->{'language'} !== null) {
            $object->setLanguage($data->{'language'});
        } elseif (property_exists($data, 'language') && $data->{'language'} === null) {
            $object->setLanguage(null);
        }
        if (property_exists($data, 'force_language') && $data->{'force_language'} !== null) {
            $object->setForceLanguage($data->{'force_language'});
        } elseif (property_exists($data, 'force_language') && $data->{'force_language'} === null) {
            $object->setForceLanguage(null);
        }
        if (property_exists($data, 'emailed') && $data->{'emailed'} !== null) {
            $object->setEmailed($data->{'emailed'});
        } elseif (property_exists($data, 'emailed') && $data->{'emailed'} === null) {
            $object->setEmailed(null);
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
        if (property_exists($data, 'declined') && $data->{'declined'} !== null) {
            $object->setDeclined($data->{'declined'});
        } elseif (property_exists($data, 'declined') && $data->{'declined'} === null) {
            $object->setDeclined(null);
        }
        if (property_exists($data, 'declined_on') && $data->{'declined_on'} !== null) {
            $object->setDeclinedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'declined_on'}));
        } elseif (property_exists($data, 'declined_on') && $data->{'declined_on'} === null) {
            $object->setDeclinedOn(null);
        }
        if (property_exists($data, 'forwarded') && $data->{'forwarded'} !== null) {
            $object->setForwarded($data->{'forwarded'});
        } elseif (property_exists($data, 'forwarded') && $data->{'forwarded'} === null) {
            $object->setForwarded(null);
        }
        if (property_exists($data, 'forwarded_on') && $data->{'forwarded_on'} !== null) {
            $object->setForwardedOn(DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data->{'forwarded_on'}));
        } elseif (property_exists($data, 'forwarded_on') && $data->{'forwarded_on'} === null) {
            $object->setForwardedOn(null);
        }
        if (property_exists($data, 'forwarded_to_email') && $data->{'forwarded_to_email'} !== null) {
            $object->setForwardedToEmail($data->{'forwarded_to_email'});
        } elseif (property_exists($data, 'forwarded_to_email') && $data->{'forwarded_to_email'} === null) {
            $object->setForwardedToEmail(null);
        }
        if (property_exists($data, 'forwarded_reason') && $data->{'forwarded_reason'} !== null) {
            $object->setForwardedReason($data->{'forwarded_reason'});
        } elseif (property_exists($data, 'forwarded_reason') && $data->{'forwarded_reason'} === null) {
            $object->setForwardedReason(null);
        }
        if (property_exists($data, 'message') && $data->{'message'} !== null) {
            $object->setMessage($data->{'message'});
        } elseif (property_exists($data, 'message') && $data->{'message'} === null) {
            $object->setMessage(null);
        }
        if (property_exists($data, 'embed_url_user_id') && $data->{'embed_url_user_id'} !== null) {
            $object->setEmbedUrlUserId($data->{'embed_url_user_id'});
        } elseif (property_exists($data, 'embed_url_user_id') && $data->{'embed_url_user_id'} === null) {
            $object->setEmbedUrlUserId(null);
        }
        if (property_exists($data, 'inputs') && $data->{'inputs'} !== null) {
            $values = [];
            foreach ($data->{'inputs'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'SignRequest\\Client\\Model\\SignerInputs', 'json', $context);
            }
            $object->setInputs($values);
        } elseif (property_exists($data, 'inputs') && $data->{'inputs'} === null) {
            $object->setInputs(null);
        }
        if (property_exists($data, 'use_stamp_for_approve_only') && $data->{'use_stamp_for_approve_only'} !== null) {
            $object->setUseStampForApproveOnly($data->{'use_stamp_for_approve_only'});
        } elseif (property_exists($data, 'use_stamp_for_approve_only') && $data->{'use_stamp_for_approve_only'} === null) {
            $object->setUseStampForApproveOnly(null);
        }
        if (property_exists($data, 'embed_url') && $data->{'embed_url'} !== null) {
            $object->setEmbedUrl($data->{'embed_url'});
        } elseif (property_exists($data, 'embed_url') && $data->{'embed_url'} === null) {
            $object->setEmbedUrl(null);
        }
        if (property_exists($data, 'attachments') && $data->{'attachments'} !== null) {
            $values_1 = [];
            foreach ($data->{'attachments'} as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'SignRequest\\Client\\Model\\SignerAttachment', 'json', $context);
            }
            $object->setAttachments($values_1);
        } elseif (property_exists($data, 'attachments') && $data->{'attachments'} === null) {
            $object->setAttachments(null);
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
        if (property_exists($data, 'after_document') && $data->{'after_document'} !== null) {
            $object->setAfterDocument($data->{'after_document'});
        } elseif (property_exists($data, 'after_document') && $data->{'after_document'} === null) {
            $object->setAfterDocument(null);
        }
        if (property_exists($data, 'integrations') && $data->{'integrations'} !== null) {
            $values_2 = [];
            foreach ($data->{'integrations'} as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'SignRequest\\Client\\Model\\InlineDocumentSignerIntegrationData', 'json', $context);
            }
            $object->setIntegrations($values_2);
        } elseif (property_exists($data, 'integrations') && $data->{'integrations'} === null) {
            $object->setIntegrations(null);
        }
        if (property_exists($data, 'password') && $data->{'password'} !== null) {
            $object->setPassword($data->{'password'});
        } elseif (property_exists($data, 'password') && $data->{'password'} === null) {
            $object->setPassword(null);
        }

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $data = new stdClass();
        if ($object->getEmail() !== null) {
            $data->{'email'} = $object->getEmail();
        } else {
            $data->{'email'} = null;
        }
        if ($object->getFirstName() !== null) {
            $data->{'first_name'} = $object->getFirstName();
        } else {
            $data->{'first_name'} = null;
        }
        if ($object->getLastName() !== null) {
            $data->{'last_name'} = $object->getLastName();
        } else {
            $data->{'last_name'} = null;
        }
        if ($object->getNeedsToSign() !== null) {
            $data->{'needs_to_sign'} = $object->getNeedsToSign();
        } else {
            $data->{'needs_to_sign'} = null;
        }
        if ($object->getApproveOnly() !== null) {
            $data->{'approve_only'} = $object->getApproveOnly();
        } else {
            $data->{'approve_only'} = null;
        }
        if ($object->getNotifyOnly() !== null) {
            $data->{'notify_only'} = $object->getNotifyOnly();
        } else {
            $data->{'notify_only'} = null;
        }
        if ($object->getInPerson() !== null) {
            $data->{'in_person'} = $object->getInPerson();
        } else {
            $data->{'in_person'} = null;
        }
        if ($object->getOrder() !== null) {
            $data->{'order'} = $object->getOrder();
        } else {
            $data->{'order'} = null;
        }
        if ($object->getLanguage() !== null) {
            $data->{'language'} = $object->getLanguage();
        } else {
            $data->{'language'} = null;
        }
        if ($object->getForceLanguage() !== null) {
            $data->{'force_language'} = $object->getForceLanguage();
        } else {
            $data->{'force_language'} = null;
        }
        if ($object->getVerifyPhoneNumber() !== null) {
            $data->{'verify_phone_number'} = $object->getVerifyPhoneNumber();
        } else {
            $data->{'verify_phone_number'} = null;
        }
        if ($object->getVerifyBankAccount() !== null) {
            $data->{'verify_bank_account'} = $object->getVerifyBankAccount();
        } else {
            $data->{'verify_bank_account'} = null;
        }
        if ($object->getEmbedUrlUserId() !== null) {
            $data->{'embed_url_user_id'} = $object->getEmbedUrlUserId();
        } else {
            $data->{'embed_url_user_id'} = null;
        }
        if ($object->getUseStampForApproveOnly() !== null) {
            $data->{'use_stamp_for_approve_only'} = $object->getUseStampForApproveOnly();
        } else {
            $data->{'use_stamp_for_approve_only'} = null;
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
        if ($object->getAfterDocument() !== null) {
            $data->{'after_document'} = $object->getAfterDocument();
        } else {
            $data->{'after_document'} = null;
        }
        if ($object->getIntegrations() !== null) {
            $values = [];
            foreach ($object->getIntegrations() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'integrations'} = $values;
        } else {
            $data->{'integrations'} = null;
        }
        if ($object->getPassword() !== null) {
            $data->{'password'} = $object->getPassword();
        } else {
            $data->{'password'} = null;
        }

        return $data;
    }
}
