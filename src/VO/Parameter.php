<?php

namespace Rekuital\BitrixComponentParameters\VO;

use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;

class Parameter
{
    /** Код группы, если нет - ставится ADDITIONAL_SETTINGS */
    protected const PARENT = 'PARENT';

    /** Название параметра на текущем языке */
	protected const NAME = 'NAME';

    /** Тип элемента управления, в котором будет устанавливаться параметр */
	protected const TYPE = 'TYPE';

    /** Перегружать настройки или нет после выбора (N/Y) */
	protected const REFRESH = 'REFRESH';

    /** Одиночное/множественное значение (N/Y) */
	protected const MULTIPLE = 'MULTIPLE';

    /** Массив значений для списка */
	protected const VALUES = 'VALUES';

    /** Показывать поле для значений, вводимых вручную (Y/N) */
	protected const ADDITIONAL_VALUES = 'ADDITIONAL_VALUES';

    /** Число строк для списка (если нужен не выпадающий список) */
	protected const SIZE = 'SIZE';

    /** Значение по умолчанию */
	protected const DEFAULT = 'DEFAULT';

    /** Ширина поля в символах */
	protected const COLS = 'COLS';

    public function __construct(
        protected ?string $groupCode,
        protected string $parameterCode,
        protected ?string $name,
        protected ?ParameterTypeEnum $type,
        protected bool $isRefresh,
        protected bool $isMultiple,
        protected ?array $values,
        protected bool $hasAdditionalValue,
        protected ?int $size,
        protected string|array|null $defaultValue,
        protected ?int $widthField,
    ) {
    }

    public function getParameterCode(): string
    {
        return $this->parameterCode;
    }

    public function toArray(): array
    {
        return array_filter([
            self::PARENT => $this->groupCode,
            self::NAME => $this->name,
            self::TYPE => $this->type->value,
            self::REFRESH => $this->isRefresh ? 'Y' : null,
            self::MULTIPLE => $this->isMultiple ? 'Y' : null,
            self::VALUES => $this->values,
            self::ADDITIONAL_VALUES => $this->hasAdditionalValue ? 'Y' : null,
            self::SIZE => $this->size,
            self::DEFAULT => $this->defaultValue,
            self::COLS => $this->widthField,
        ], fn ($item) => !is_null($item));
    }
}