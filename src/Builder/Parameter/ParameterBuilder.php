<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Builder\GroupBuilder;
use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;
use Rekuital\BitrixComponentParameters\VO\Parameter;

abstract class ParameterBuilder
{
    protected ?string $groupCode = null;
    protected string $parameterCode;
    protected ?string $name;
    protected ?ParameterTypeEnum $type;

    public function __construct(
        protected GroupBuilder $builder,
        string $code,
        ?string $groupCode = null,
        ?ParameterTypeEnum $type = null,
        ?string $name = null
    ) {
        $this->parameterCode = $code;
        $this->groupCode = $groupCode;
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Задает код группы к которому относится параметр
     * @deprecated
     */
    public function setGroupCode(?string $groupCode): static
    {
        $this->groupCode = $groupCode;

        return $this;
    }

    /**
     * Задает текстовое название параметра
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Задает тип параметра
     * @deprecated
     */
    public function setType(ParameterTypeEnum $type): static
    {
        $this->type = $type;

        return $this;
    }

    abstract public function create(): Parameter;

    public function complete(): GroupBuilder
    {
        return $this->builder;
    }

}