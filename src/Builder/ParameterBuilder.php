<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;

class ParameterBuilder
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

    protected ?string $groupCode = null;
    protected string $parameterCode;

    protected string $name;
    protected ParameterTypeEnum $type;
    protected bool $isRefresh = false;
    protected bool $isMultiple = false;
    protected ?array $values = null;
    protected bool $hasAdditionalValue = false;
    protected ?int $size = null;
    protected string|array|null $defaultValue = null;
    protected ?int $widthField = null;

    public function __construct(string $parameterCode)
    {
        $this->parameterCode = $parameterCode;
    }

    public function configureGroupCode(?string $groupCode): static
    {
        $this->groupCode = $groupCode;

        return $this;
    }

    public function configureName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function configureType(ParameterTypeEnum $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function configureRefresh(bool $value = true): static
    {
        $this->isRefresh = $value;

        return $this;
    }

    public function configureMultiple(bool $value = true): static
    {
        $this->isMultiple = $value;

        return $this;
    }

    public function configureValues(?array $values): static
    {
        $this->values = $values;

        return $this;
    }

    public function configureHasAdditionalValue(bool $value = true): static
    {
        $this->hasAdditionalValue = $value;

        return $this;
    }

    /**
     * Конфигурирует число строк для параметров типа список
     */
    public function configureSize(?int $value): static
    {
        $this->size = $value;

        return $this;
    }

    public function configureDefaultValue(array|string|null $value): static
    {
        $this->defaultValue = $value;

        return $this;
    }

    /**
     * Ширина поля в символах
     */
    public function configureWidthField(?int $value): static
    {
        $this->widthField = $value;

        return $this;
    }


}