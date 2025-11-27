<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\DefaultValueConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\MultipleConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\RefreshConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\WithFieldConfigTrait;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterListBuilder extends ParameterBuilder
{
    use MultipleConfigTrait, RefreshConfigTrait, DefaultValueConfigTrait, WithFieldConfigTrait;

    protected ?array $values = null;
    protected ?int $size = null;
    protected bool $hasAdditionalValue = false;

    /**
     * Задает массив вариантов значений для параметра
     *
     * @param array<string, string>|null $values
     */
    public function setVariantsList(?array $values): static
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Добавляет вариант значения для параметра
     */
    public function addVariant(string $code, string $name): static
    {
        $this->values[$code] = $name;

        return $this;
    }

    /**
     * Конфигурирует число строк для селекта
     */
    public function setSize(?int $value): static
    {
        $this->size = $value;

        return $this;
    }

    /**
     * Показывать ли поле для значений вводимых вручную
     */
    public function setHasAdditionalValue(bool $value = true): static
    {
        $this->hasAdditionalValue = $value;

        return $this;
    }

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            isRefresh: $this->isRefresh,
            isMultiple: $this->isMultiple,
            hasAdditionalValue: $this->hasAdditionalValue,
            defaultValue: $this->defaultValue,
            widthField: $this->widthField,
            values: $this->values,
            size: $this->size,
        );
    }
}