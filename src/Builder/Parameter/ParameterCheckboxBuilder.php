<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\DefaultValueConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\RefreshConfigTrait;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterCheckboxBuilder extends ParameterBuilder
{
    use RefreshConfigTrait, DefaultValueConfigTrait;

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