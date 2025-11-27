<?php

namespace Rekuital\BitrixComponentParameters\Enum;

enum ParameterTypeEnum: string
{
    /** Выбор из списка значений */
    case LIST = 'LIST';

    /** Текстовое поле ввода */
    case STRING = 'STRING';

    /** Чекбокс */
    case CHECKBOX = 'CHECKBOX';

    /** Кастомный элемент управления */
    case CUSTOM = 'CUSTOM';

    /** Выбор файла */
    case FILE = 'FILE';
    /**
     * FD_TARGET - default = "F" --- F - file only, D - folder only, DF - files & dirs
     * FD_EXT - default = "" --- string - Список расширений через запятую
     * FD_UPLOAD - default = false --- bool
     * FD_USE_MEDIALIB - default = false --- bool
     * FD_USE_ONLY_MEDIALIB - default = false --- bool
     * FD_MEDIALIB_TYPES - default = false --- ?array - список кодов из таблицы b_medialib_type поля CODE
     */

    /** Выбор цвета */
    case COLOR_PICKER = 'COLORPICKER';
}
