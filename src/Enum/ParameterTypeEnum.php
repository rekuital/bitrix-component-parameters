<?php

namespace Rekuital\BitrixComponentParameters\Enum;

use Rekuital\BitrixComponentParameters\Builder\GroupBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterCheckboxBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterColorpickerBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterCustomBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterFileBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterListBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterStringBuilder;

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

    public function createParameterBuilder(
        GroupBuilder $groupBuilder,
        string $groupCode,
        string $code,
        string $name,
    ): ParameterBuilder {
        return match ($this) {
            self::LIST => new ParameterListBuilder(
                builder: $groupBuilder,
                code: $code,
                groupCode: $groupCode,
                type: $this,
                name: $name
            ),
            self::STRING => new ParameterStringBuilder(
                builder: $groupBuilder,
                code: $code,
                groupCode: $groupCode,
                type: $this,
                name: $name
            ),
            self::CHECKBOX => new ParameterCheckboxBuilder(
                builder: $groupBuilder,
                code: $code,
                groupCode: $groupCode,
                type: $this,
                name: $name
            ),
            self::CUSTOM => new ParameterCustomBuilder(
                builder: $groupBuilder,
                code: $code,
                groupCode: $groupCode,
                type: $this,
                name: $name
            ),
            self::FILE => new ParameterFileBuilder(
                builder: $groupBuilder,
                code: $code,
                groupCode: $groupCode,
                type: $this,
                name: $name
            ),
            self::COLOR_PICKER => new ParameterColorpickerBuilder(
                builder: $groupBuilder,
                code: $code,
                groupCode: $groupCode,
                type: $this,
                name: $name
            ),
        };
    }
}
