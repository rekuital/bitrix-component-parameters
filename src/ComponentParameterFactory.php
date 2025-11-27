<?php

namespace Rekuital\BitrixComponentParameters;

use Rekuital\BitrixComponentParameters\Builder\ComponentParamsBuilder;
use Rekuital\BitrixComponentParameters\Builder\GroupBuilder;
use Rekuital\BitrixComponentParameters\Builder\ParameterBuilder;
use Rekuital\BitrixComponentParameters\Enum\GroupDefaultCodeEnum;
use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;

class ComponentParameterFactory
{
    public static function createComponentParamsBuilder(): ComponentParamsBuilder
    {
        return new ComponentParamsBuilder();
    }

    public static function createGroupBuilder(string $code, string $name, int $sort = 500): GroupBuilder
    {
        return new GroupBuilder(
            code: $code,
            name: $name,
            sort: $sort
        );
    }

    public static function createGroupBuilderBase(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::BASE->value, '');
    }

    public static function createGroupBuilderDataSource(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::DATA_SOURCE->value, '');
    }

    public static function createGroupBuilderVisual(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::VISUAL->value, '');
    }

    public static function createGroupBuilderUserConsent(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::USER_CONSENT->value, '');
    }

    public static function createGroupBuilderUrlTemplates(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::URL_TEMPLATES->value, '');
    }

    public static function createGroupBuilderSefMode(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::SEF_MODE->value, '');
    }

    public static function createGroupBuilderAjaxSettings(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::AJAX_SETTINGS->value, '');
    }

    public static function createGroupBuilderCacheSettings(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::CACHE_SETTINGS->value, '');
    }

    public static function createGroupBuilderAdditionalSettings(): GroupBuilder
    {
        return static::createGroupBuilder(GroupDefaultCodeEnum::ADDITIONAL_SETTINGS->value, '');
    }

    public static function createParameterBuilder(ParameterTypeEnum $type, string $code, string $name): ParameterBuilder
    {
        return new ParameterBuilder(
            code: $code,
            type: $type,
            name: $name,
        );
    }

    public static function createParameterSetTitle(): ParameterBuilder
    {
        return new ParameterBuilder(
            code: 'SET_TITLE',
        );
    }

    public static function createParameterCacheTime(int $cacheTime = 3600): ParameterBuilder
    {
        return (new ParameterBuilder(
            code: 'CACHE_TIME',
        ))->configureDefaultValue($cacheTime);
    }

    public static function createParameterAjaxMode(): ParameterBuilder
    {
        return new ParameterBuilder(
            code: 'AJAX_MODE',
        );
    }

    public static function createParameterUserConsent(): ParameterBuilder
    {
        return new ParameterBuilder(
            code: 'USER_CONSENT',
        );
    }
}