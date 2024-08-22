<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Religion extends Enum
{
    const Islam = 1;

    const Protestant = 2;

    const Katholik = 3;

    const Buddha = 4;

    const Hindu = 5;

    const Konghucu = 6;
}
