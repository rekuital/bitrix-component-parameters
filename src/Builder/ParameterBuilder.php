<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterBuilder
{
    protected ?string $groupCode = null;
    protected string $parameterCode;
    protected ?string $name;
    protected ?ParameterTypeEnum $type;
    protected bool $isRefresh = false;
    protected bool $isMultiple = false;
    protected ?array $values = null;
    protected bool $hasAdditionalValue = false;
    protected ?int $size = null;
    protected string|array|null $defaultValue = null;
    protected ?int $widthField = null;

    public function __construct(string $code, ?ParameterTypeEnum $type = null, ?string $name = null)
    {
        $this->parameterCode = $code;
        $this->type = $type;
        $this->name = $name;
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

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            isRefresh: $this->isRefresh,
            isMultiple: $this->isMultiple,
            values: $this->values,
            hasAdditionalValue: $this->hasAdditionalValue,
            size: $this->size,
            defaultValue: $this->defaultValue,
            widthField: $this->widthField,
        );
    }


}