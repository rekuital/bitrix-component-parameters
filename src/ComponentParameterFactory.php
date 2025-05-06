<?php

namespace Rekuital\BitrixComponentParameters;

use Rekuital\BitrixComponentParameters\Builder\ComponentParamsBuilder;
use Rekuital\BitrixComponentParameters\VO\Group;

class ComponentParameterFactory
{
    public static function createComponentParamsBuilder(): ComponentParamsBuilder
    {
        return new ComponentParamsBuilder();
    }

    public static function createGroup(string $code, string $name, int $sort = 500): Group
    {
        return new Group(
            code: $code,
            name: $name,
            sort: $sort,
        );
    }
}