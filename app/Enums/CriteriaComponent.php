<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CriteriaComponent extends Enum
{
    #[Description('Incumbent / Petahana - Jika Iya maka berapa total suara pemilu sebelumnya')]
    const Incumbent = 1;

    #[Description('Jabatan Dalam Partai - Jabatan Dalam Partai')]
    const Jabatan = 2;

    #[Description('Masa Bakti Dalam Partai - Berapa lama')]
    const Bakti = 3;

    #[Description('Kontribusi Ke Partai - Apa saja kontribusinya ke partai')]
    const Kontribusi = 4;

    #[Description('Ketokohan - Ketokohan yang anda miliki')]
    const Ketokohan = 5;
}
