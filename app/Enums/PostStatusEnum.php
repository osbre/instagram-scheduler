<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static PostStatusEnum IN_PROGRESS()
 * @method static PostStatusEnum PUBLISHED()
 */
final class PostStatusEnum extends Enum
{
    public const IN_PROGRESS = 'in progress';
    public const PUBLISHED = 'published';
}
