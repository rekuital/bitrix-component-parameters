<?php

namespace Rekuital\BitrixComponentParameters;

use Rekuital\BitrixComponentParameters\Builder\ComponentParamsBuilder;

class ComponentParameterFactory
{
    public static function createComponentParamsBuilder(): ComponentParamsBuilder
    {
        return new ComponentParamsBuilder();
    }
}