<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static PostStatusEnum CREATED()
 * @method static PostStatusEnum PUBLISHED()
 */
final class PostStatusEnum extends Enum
{
    public const CREATED = 'created';
    public const PUBLISHED = 'published';
}
