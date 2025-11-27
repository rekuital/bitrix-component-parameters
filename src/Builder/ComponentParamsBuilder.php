<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use Rekuital\BitrixComponentParameters\VO\GroupCollection;
use Rekuital\BitrixComponentParameters\VO\ParameterCollection;

class ComponentParamsBuilder
{
    /** @var GroupBuilder[] */
    protected array $groupBuilders = [];

    /** @var ParameterBuilder[] */
    protected array $parameterBuilders = [];

    public function addGroupBuilder(GroupBuilder $groupBuilder): static
    {
        $this->groupBuilders[] = $groupBuilder;

        return $this;
    }

    public function addParameterBuilder(ParameterBuilder $parameterBuilder): static
    {
        $this->parameterBuilders[] = $parameterBuilder;

        return $this;
    }

    public function create(): array
    {
        $groups = new GroupCollection(
            array_values(array_filter(array_map(fn($groupBuilder) => $groupBuilder->create(), $this->groupBuilders)))
        );

        $parameters = new ParameterCollection();
        foreach ($this->groupBuilders as $groupBuilder) {
            foreach ($groupBuilder->getParameterBuilder() as $parameterBuilder) {
                $parameters[] = $parameterBuilder->create();
            }
        }
        foreach ($this->parameterBuilders as $parameterBuilder) {
            $parameters[] = $parameterBuilder->create();
        }

        return [
            'GROUPS' => $groups->toArray(),
            'PARAMETERS' => $parameters->toArray(),
        ];
    }
}