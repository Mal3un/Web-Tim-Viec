<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CompanyCountryEnum extends Enum
{
    public const VN = 'Vietnam';
    public const US =   'United States';
    public const EU = 'Europe';
    public const JP =   'Japan';

}
