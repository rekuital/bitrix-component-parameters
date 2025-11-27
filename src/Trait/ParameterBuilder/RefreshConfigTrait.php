<?php

namespace Rekuital\BitrixComponentParameters\Trait\ParameterBuilder;

trait RefreshConfigTrait
{
    protected bool $isRefresh = false;

    /**
     * Задает перезагружать ли настройки компонента, после указания значения в параметре
     */
    public function setRefresh(bool $value = true): static
    {
        $this->isRefresh = $value;

        return $this;
    }
}