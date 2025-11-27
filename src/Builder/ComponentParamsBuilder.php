<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use Rekuital\BitrixComponentParameters\Enum\GroupDefaultCodeEnum;
use Rekuital\BitrixComponentParameters\VO\GroupCollection;
use Rekuital\BitrixComponentParameters\VO\Parameter;
use Rekuital\BitrixComponentParameters\VO\ParameterCollection;

class ComponentParamsBuilder
{
    /** @var GroupBuilder[] */
    protected array $groupBuilders = [];

    /** @var Parameter[] */
    protected array $parameters = [];

    public function addGroupBuilderBase(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::BASE->value, '');
    }

    public function addGroupBuilderDataSource(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::DATA_SOURCE->value, '');
    }

    public function addGroupBuilderVisual(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::VISUAL->value, '');
    }

    public function addGroupBuilderUserConsent(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::USER_CONSENT->value, '');
    }

    public function addGroupBuilderUrlTemplates(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::URL_TEMPLATES->value, '');
    }

    public function addGroupBuilderSefMode(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::SEF_MODE->value, '');
    }

    public function addGroupBuilderAjaxSettings(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::AJAX_SETTINGS->value, '');
    }

    public function addGroupBuilderCacheSettings(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::CACHE_SETTINGS->value, '');
    }

    public function addGroupBuilderAdditionalSettings(): GroupBuilder
    {
        return static::addGroupBuilder(GroupDefaultCodeEnum::ADDITIONAL_SETTINGS->value, '');
    }

    public function addGroupBuilder(string $code, string $name, int $sort = 500): GroupBuilder
    {
        $this->groupBuilders[] = new GroupBuilder(
            parameterBuilder: $this,
            code: $code,
            name: $name,
            sort: $sort
        );

        return $this->groupBuilders[count($this->groupBuilders) - 1];
    }

    public function addParameterSetTitle(): static
    {
        $this->createCommonParameter('SET_TITLE');

        return $this;
    }

    public function addParameterCacheTime(int $cacheTime = 3600): static
    {
        $this->createCommonParameter('CACHE_TIME', (string)$cacheTime);

        return $this;
    }

    public function addParameterAjaxMode(): static
    {
        $this->createCommonParameter('AJAX_MODE');

        return $this;
    }

    public function addParameterUserConsent(): static
    {
        $this->createCommonParameter('USER_CONSENT');

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
        foreach ($this->parameters as $parameter) {
            $parameters[] = $parameter;
        }

        return [
            'GROUPS' => $groups->toArray(),
            'PARAMETERS' => $parameters->toArray(),
        ];
    }

    protected function createCommonParameter(string $parameterCode, ?string $defaultValue = null): void
    {
        $this->parameters[] = new Parameter(
            groupCode: null,
            parameterCode: $parameterCode,
            name: null,
            type: null,
            defaultValue: $defaultValue,
        );
    }
}