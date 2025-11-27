<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;
use Rekuital\BitrixComponentParameters\ComponentParameterFactory;
use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;

Loc::loadMessages(__FILE__);

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/bitrix-component-parameters/vendor/autoload.php");

try
{
    $builder = ComponentParameterFactory::createComponentParamsBuilder()
        ->addParameterBuilder(ComponentParameterFactory::createParameterAjaxMode())
        ->addParameterBuilder(ComponentParameterFactory::createParameterCacheTime())
        ->addParameterBuilder(ComponentParameterFactory::createParameterSetTitle())
        ->addParameterBuilder(ComponentParameterFactory::createParameterUserConsent())
        ->addGroupBuilder(ComponentParameterFactory::createGroupBuilderBase()
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::STRING, 'TEST', 'Тестовый параметр'))
        )
        ->addGroupBuilder(ComponentParameterFactory::createGroupBuilder('CUSTOM', 'Своя группа параметров', 1000)
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::CHECKBOX, 'TEST_CHECKBOX', 'Тестовый чекбокс'))
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::CUSTOM, 'TEST_CUSTOM', 'Тестовый кастомный параметр'))
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::FILE, 'TEST_FILE', 'Тестовый файл'))
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::LIST, 'TEST_LIST', 'Тестовый список'))
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::STRING, 'TEST_STRING', 'Тестовый строковый параметр'))
            ->addParameterBuilder(ComponentParameterFactory::createParameterBuilder(ParameterTypeEnum::COLOR_PICKER, 'TEST_COLOR', 'Тестовый выбор цвета'))
        )
    ;

    $arComponentParameters = $builder->create();
}
catch (Main\LoaderException $e)
{
	ShowError($e->getMessage());
}
?>