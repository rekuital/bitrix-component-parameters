<?php

namespace Rekuital\BitrixComponentParameters\Enum;

enum FileTargetTypeEnum: string
{
    /** Только файлы */
    case FILE = 'F';

    /** Только папки/директории */
    case FOLDER = 'D';

    /** Файлы и папки/директории */
    case ALL = 'DF';
}
