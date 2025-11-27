<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use BadMethodCallException;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterCheckboxBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterColorpickerBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterCustomBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterFileBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterListBuilder;
use Rekuital\BitrixComponentParameters\Builder\Parameter\ParameterStringBuilder;
use Rekuital\BitrixComponentParameters\Enum\GroupDefaultCodeEnum;
use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;
use Rekuital\BitrixComponentParameters\VO\Group;

/**
 * @method ParameterStringBuilder addParameterString(string $code, string $name)
 * @method ParameterListBuilder addParameterList(string $code, string $name)
 * @method ParameterFileBuilder addParameterFile(string $code, string $name)
 * @method ParameterCheckboxBuilder addParameterCheckbox(string $code, string $name)
 * @method ParameterColorpickerBuilder addParameterColorpicker(string $code, string $name)
 * @method ParameterCustomBuilder addParameterCustom(string $code, string $name)
 */
class GroupBuilder
{
    /** @var ParameterBuilder[] */
    protected array $parameters = [];

    public function __construct(
        protected ComponentParamsBuilder $parameterBuilder,
        protected string $code,
        protected string $name,
        protected int $sort,
    ) {
    }

    public function __call(string $name, array $arguments)
    {
        if (str_starts_with($name, 'addParameter')) {
            $parameterType = strtoupper(preg_replace(
                '/(?<!^)[A-Z]/',
                '_$0',
                substr($name, strlen('addParameter'))
            ));
            $parameterBuilder = ParameterTypeEnum::from($parameterType)
                ->createParameterBuilder($this, $this->code, ...$arguments);

            $this->parameters[] = $parameterBuilder;
            return $parameterBuilder;
        }

        throw new BadMethodCallException("Method '$name' does not exist.");
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

    public function complete(): ComponentParamsBuilder
    {
        return $this->parameterBuilder;
    }
}