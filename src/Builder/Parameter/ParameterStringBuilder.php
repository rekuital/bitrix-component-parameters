<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\DefaultValueConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\MultipleConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\RefreshConfigTrait;
use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\WithFieldConfigTrait;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterStringBuilder extends ParameterBuilder
{
    use WithFieldConfigTrait, RefreshConfigTrait, MultipleConfigTrait, DefaultValueConfigTrait;

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            isRefresh: $this->isRefresh,
            isMultiple: $this->isMultiple,
            defaultValue: $this->defaultValue,
            widthField: $this->widthField,
        );
    }
}