<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\DefaultValueConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\MultipleConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\RefreshConfigTrait;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterCustomBuilder extends ParameterBuilder
{
    use DefaultValueConfigTrait, RefreshConfigTrait, MultipleConfigTrait;

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            isRefresh: $this->isRefresh, // Под вопросом, будет ли работать?
            isMultiple: $this->isMultiple, // Под вопросом, будет ли работать?
            defaultValue: $this->defaultValue,
        );
    }
}