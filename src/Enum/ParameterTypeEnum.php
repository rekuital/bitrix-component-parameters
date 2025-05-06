<?php

namespace Rekuital\BitrixComponentParameters\Enum;

enum ParameterTypeEnum: string
{
    case LIST = 'LIST';
    case STRING = 'STRING';
    case CHECKBOX = 'CHECKBOX';
    case CUSTOM = 'CUSTOM';
    case FILE = 'FILE';
    /**
     * FD_TARGET - default = "F" --- F - file only, D - folder only, DF - files & dirs
     * FD_EXT - default = "" --- string - Список расширений через запятую
     * FD_UPLOAD - default = false --- bool
     * FD_USE_MEDIALIB - default = false --- bool
     * FD_USE_ONLY_MEDIALIB - default = false --- bool
     * FD_MEDIALIB_TYPES - default = false --- ?array - список кодов из таблицы b_medialib_type поля CODE
     */

    case COLOR_PICKER = 'COLORPICKER';
}
