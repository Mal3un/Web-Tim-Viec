<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostRemoteableEnum extends Enum
{
    public const REMOVE_ONLY =   '1';
    public const OFFICE_ONLY =   '2';
    public const DYNAMIC     =   '3';
}
