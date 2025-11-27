<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use Rekuital\BitrixComponentParameters\Enum\GroupDefaultCodeEnum;
use Rekuital\BitrixComponentParameters\VO\Group;

class GroupBuilder
{
    /** @var ParameterBuilder[] */
    protected array $parameters = [];

    public function __construct(
        protected string $code,
        protected string $name,
        protected int $sort,
    ) {
    }

    public function addParameterBuilder(ParameterBuilder $parameterBuilder): static
    {
        $parameterBuilder->configureGroupCode($this->code);
        $this->parameters[] = $parameterBuilder;

        return $this;
    }

    /**
     * @return ParameterBuilder[]
     */
    public function getParameterBuilder(): array
    {
        return $this->parameters;
    }

    public function create(): ?Group
    {
        if (GroupDefaultCodeEnum::isDefaultGroup($this->code)) {
            return null;
        }

        return new Group(
            code: $this->code,
            name: $this->name,
            sort: $this->sort
        );
    }
}