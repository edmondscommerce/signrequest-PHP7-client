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

final class DocumentSignrequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return $type === 'SignRequest\\Client\\Model\\DocumentSignrequest';
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && get_class($data) === 'SignRequest\\Client\\Model\\DocumentSignrequest';
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \SignRequest\Client\Model\DocumentSignrequest();
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

        return $object;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        return new stdClass();
    }
}
