<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\DefaultValueConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\RefreshConfigTrait;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterColorpickerBuilder extends ParameterBuilder
{
    use DefaultValueConfigTrait, RefreshConfigTrait;

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            isRefresh: $this->isRefresh,
            defaultValue: $this->defaultValue,
        );
    }
}