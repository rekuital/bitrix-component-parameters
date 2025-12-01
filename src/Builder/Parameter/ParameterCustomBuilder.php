<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Trait\ParameterBuilder\DefaultValueConfigTrait;
use Rekuital\BitrixComponentParameters\VO\CustomParams;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterCustomBuilder extends ParameterBuilder
{
    use DefaultValueConfigTrait;

    protected string|int|bool|array|null $jsData = null;
    protected ?string $jsEvent = null;
    protected ?string $jsFile = null;

    public function setJsFile(string $filePath): static
    {
        $this->jsFile = $filePath;

        return $this;
    }

    public function setJsEvent(string $event): static
    {
        $this->jsEvent = $event;

        return $this;
    }

    public function setJsData(string|array|int|bool|null $data): static
    {
        $this->jsData = $data;

        return $this;
    }

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            defaultValue: $this->defaultValue,
            customParams: new CustomParams(
                jsFile: $this->jsFile,
                jsEvent: $this->jsEvent,
                jsData: $this->jsData
            ),
        );
    }
}