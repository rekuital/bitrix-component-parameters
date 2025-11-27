<?php

namespace Rekuital\BitrixComponentParameters\Trait\ParameterBuilder;

trait MultipleConfigTrait
{
    protected bool $isMultiple = false;

    /**
     * Является ли параметр множественным
     */
    public function setMultiple(bool $value = true): static
    {
        $this->isMultiple = $value;

        return $this;
    }
}