<?php

declare(strict_types=1);

namespace SignRequest\Client\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    protected $normalizers      = ['SignRequest\\Client\\Model\\AuthToken' => 'SignRequest\\Client\\Normalizer\\AuthTokenNormalizer', 'SignRequest\\Client\\Model\\DocumentAttachment' => 'SignRequest\\Client\\Normalizer\\DocumentAttachmentNormalizer', 'SignRequest\\Client\\Model\\DocumentSearch' => 'SignRequest\\Client\\Normalizer\\DocumentSearchNormalizer', 'SignRequest\\Client\\Model\\InlineTeam' => 'SignRequest\\Client\\Normalizer\\InlineTeamNormalizer', 'SignRequest\\Client\\Model\\User' => 'SignRequest\\Client\\Normalizer\\UserNormalizer', 'SignRequest\\Client\\Model\\InlinePrefillTags' => 'SignRequest\\Client\\Normalizer\\InlinePrefillTagsNormalizer', 'SignRequest\\Client\\Model\\InlineIntegrationData' => 'SignRequest\\Client\\Normalizer\\InlineIntegrationDataNormalizer', 'SignRequest\\Client\\Model\\FileFromSf' => 'SignRequest\\Client\\Normalizer\\FileFromSfNormalizer', 'SignRequest\\Client\\Model\\RequiredAttachment' => 'SignRequest\\Client\\Normalizer\\RequiredAttachmentNormalizer', 'SignRequest\\Client\\Model\\SignerInputs' => 'SignRequest\\Client\\Normalizer\\SignerInputsNormalizer', 'SignRequest\\Client\\Model\\SignerAttachment' => 'SignRequest\\Client\\Normalizer\\SignerAttachmentNormalizer', 'SignRequest\\Client\\Model\\InlineDocumentSignerIntegrationData' => 'SignRequest\\Client\\Normalizer\\InlineDocumentSignerIntegrationDataNormalizer', 'SignRequest\\Client\\Model\\Signer' => 'SignRequest\\Client\\Normalizer\\SignerNormalizer', 'SignRequest\\Client\\Model\\InlineSignRequest' => 'SignRequest\\Client\\Normalizer\\InlineSignRequestNormalizer', 'SignRequest\\Client\\Model\\SigningLog' => 'SignRequest\\Client\\Normalizer\\SigningLogNormalizer', 'SignRequest\\Client\\Model\\Document' => 'SignRequest\\Client\\Normalizer\\DocumentNormalizer', 'SignRequest\\Client\\Model\\DocumentTeam' => 'SignRequest\\Client\\Normalizer\\DocumentTeamNormalizer', 'SignRequest\\Client\\Model\\DocumentSignrequest' => 'SignRequest\\Client\\Normalizer\\DocumentSignrequestNormalizer', 'SignRequest\\Client\\Model\\DocumentSigningLog' => 'SignRequest\\Client\\Normalizer\\DocumentSigningLogNormalizer', 'SignRequest\\Client\\Model\\Event' => 'SignRequest\\Client\\Normalizer\\EventNormalizer', 'SignRequest\\Client\\Model\\EventTeam' => 'SignRequest\\Client\\Normalizer\\EventTeamNormalizer', 'SignRequest\\Client\\Model\\SignRequestQuickCreate' => 'SignRequest\\Client\\Normalizer\\SignRequestQuickCreateNormalizer', 'SignRequest\\Client\\Model\\SignRequest' => 'SignRequest\\Client\\Normalizer\\SignRequestNormalizer', 'SignRequest\\Client\\Model\\TeamMember' => 'SignRequest\\Client\\Normalizer\\TeamMemberNormalizer', 'SignRequest\\Client\\Model\\TeamMemberTeam' => 'SignRequest\\Client\\Normalizer\\TeamMemberTeamNormalizer', 'SignRequest\\Client\\Model\\InlineTeamMember' => 'SignRequest\\Client\\Normalizer\\InlineTeamMemberNormalizer', 'SignRequest\\Client\\Model\\Team' => 'SignRequest\\Client\\Normalizer\\TeamNormalizer', 'SignRequest\\Client\\Model\\InviteMember' => 'SignRequest\\Client\\Normalizer\\InviteMemberNormalizer', 'SignRequest\\Client\\Model\\Placeholder' => 'SignRequest\\Client\\Normalizer\\PlaceholderNormalizer', 'SignRequest\\Client\\Model\\DocumentSignerTemplateConf' => 'SignRequest\\Client\\Normalizer\\DocumentSignerTemplateConfNormalizer', 'SignRequest\\Client\\Model\\Template' => 'SignRequest\\Client\\Normalizer\\TemplateNormalizer', 'SignRequest\\Client\\Model\\TemplateTeam' => 'SignRequest\\Client\\Normalizer\\TemplateTeamNormalizer', 'SignRequest\\Client\\Model\\WebhookSubscription' => 'SignRequest\\Client\\Normalizer\\WebhookSubscriptionNormalizer', 'SignRequest\\Client\\Model\\WebhookSubscriptionTeam' => 'SignRequest\\Client\\Normalizer\\WebhookSubscriptionTeamNormalizer', 'SignRequest\\Client\\Model\\ApiTokensGetResponse200' => 'SignRequest\\Client\\Normalizer\\ApiTokensGetResponse200Normalizer', 'SignRequest\\Client\\Model\\DocumentAttachmentsGetResponse200' => 'SignRequest\\Client\\Normalizer\\DocumentAttachmentsGetResponse200Normalizer', 'SignRequest\\Client\\Model\\DocumentsSearchGetResponse200' => 'SignRequest\\Client\\Normalizer\\DocumentsSearchGetResponse200Normalizer', 'SignRequest\\Client\\Model\\DocumentsGetResponse200' => 'SignRequest\\Client\\Normalizer\\DocumentsGetResponse200Normalizer', 'SignRequest\\Client\\Model\\EventsGetResponse200' => 'SignRequest\\Client\\Normalizer\\EventsGetResponse200Normalizer', 'SignRequest\\Client\\Model\\SignrequestsGetResponse200' => 'SignRequest\\Client\\Normalizer\\SignrequestsGetResponse200Normalizer', 'SignRequest\\Client\\Model\\SignrequestsUuidCancelSignrequestPostResponse201' => 'SignRequest\\Client\\Normalizer\\SignrequestsUuidCancelSignrequestPostResponse201Normalizer', 'SignRequest\\Client\\Model\\SignrequestsUuidResendSignrequestEmailPostResponse201' => 'SignRequest\\Client\\Normalizer\\SignrequestsUuidResendSignrequestEmailPostResponse201Normalizer', 'SignRequest\\Client\\Model\\TeamMembersGetResponse200' => 'SignRequest\\Client\\Normalizer\\TeamMembersGetResponse200Normalizer', 'SignRequest\\Client\\Model\\TeamsGetResponse200' => 'SignRequest\\Client\\Normalizer\\TeamsGetResponse200Normalizer', 'SignRequest\\Client\\Model\\TemplatesGetResponse200' => 'SignRequest\\Client\\Normalizer\\TemplatesGetResponse200Normalizer', 'SignRequest\\Client\\Model\\WebhooksGetResponse200' => 'SignRequest\\Client\\Normalizer\\WebhooksGetResponse200Normalizer'];
    protected $normalizersCache = [];

    public function supportsDenormalization($data, $type, string $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }

    public function supportsNormalization($data, string $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer      = $this->getNormalizer($normalizerClass);

        return $normalizer->normalize($object, $format, $context);
    }

    public function denormalize($data, $class, string $format = null, array $context = [])
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer      = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $class, $format, $context);
    }

    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }

    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;

        return $normalizer;
    }
}
