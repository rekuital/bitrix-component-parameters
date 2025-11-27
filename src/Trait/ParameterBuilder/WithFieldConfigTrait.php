<?php

namespace Rekuital\BitrixComponentParameters\Trait\ParameterBuilder;

trait WithFieldConfigTrait
{
    protected ?int $widthField = null;

    /**
     * Задает ширину поля в символах
     */
    public function setWidthField(?int $value): static
    {
        $this->widthField = $value;

        return $this;
    }
}