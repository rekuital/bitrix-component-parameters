<?php

namespace Rekuital\BitrixComponentParameters\Trait\ParameterBuilder;

trait DefaultValueConfigTrait
{
    protected string|array|null $defaultValue = null;

    /**
     * Задает значение параметра по умолчанию
     */
    public function setDefaultValue(array|string|null $value): static
    {
        $this->defaultValue = $value;

        return $this;
    }
}