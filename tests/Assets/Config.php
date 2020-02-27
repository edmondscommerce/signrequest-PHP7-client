<?php

declare(strict_types=1);

namespace SignRequest\Tests\Assets;

/**
 * @see https://ec-sandbox.signrequest.com/#/teams
 */
final class Config
{
    public const SUBDOMAIN  = 'ec-sandbox';
    public const TOKEN      = '7b96eb1c0f2b7a823ec68041beabfce8ccd71d34';
    public const FROM_EMAIL = 'signrequest-' . self::SUBDOMAIN . '@developmagento.co.uk';
}
