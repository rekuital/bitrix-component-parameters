<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;
use Rekuital\BitrixComponentParameters\ComponentParameterFactory;
use Rekuital\BitrixComponentParameters\Enum\FileTargetTypeEnum;

Loc::loadMessages(__FILE__);

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/bitrix-component-parameters/vendor/autoload.php");

try
{
    /*$builder = ComponentParameterFactory::createComponentParamsBuilder()
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

    $arComponentParameters = $builder->create();*/

    $builder = ComponentParameterFactory::createComponentParamsBuilder()
        ->addParameterAjaxMode()
        ->addParameterCacheTime()
        ->addParameterSetTitle()
        ->addParameterUserConsent()
        ->addGroupBuilder('CUSTOM', 'Своя группа параметров', 1000)
        ->addParameterCheckbox('TEST_CHECKBOX', 'Тестовый чекбокс')
        ->setRefresh()
        ->setDefaultValue('Y')
        ->complete()
        ->addParameterCustom('TEST_CUSTOM', 'Тестовый кастомный параметр')
        ->setMultiple()
        ->setRefresh()
        ->setDefaultValue('123')
        ->complete()
        ->addParameterFile('TEST_FILE', 'Тестовый файл')
        ->setTarget(FileTargetTypeEnum::FILE)
        ->setExtensions(['png', 'jpg'])
        ->addExtension('mp4')
        ->setMediaLibTypes(['image'])
        ->addMediaLibType('video')
        ->complete()
        ->addParameterList('TEST_LIST', 'Тестовый список')
        ->setDefaultValue('OPTION_1')
        ->setRefresh()
        ->setSize(5)
        ->setMultiple()
        ->setHasAdditionalValue()
        ->setWidthField(100)
        ->setVariantsList(['OPTION_1' => 'опция 1', 'OPTION_2' => 'опция 2'])
        ->addVariant('OPTION_3', 'опция 3')
        ->addVariant('OPTION_4', 'опция 4')
        ->addVariant('OPTION_5', 'опция 5')
        ->addVariant('OPTION_6', 'опция 6')
        ->complete()
        ->addParameterString('TEST_STRING', 'Тестовый строковый параметр')
        ->setWidthField(100)
        ->setMultiple()
        ->setRefresh()
        ->setDefaultValue(['Тест'])
        ->complete()
        ->addParameterColorpicker('TEST_COLOR', 'Тестовый выбор цвета')
        ->setDefaultValue('EEE')
        ->setRefresh()
        ->complete()
        ->complete()
        ->addGroupBuilderBase()
        ->addParameterString('TEST_STRING_PARAM', 'Тестовый параметр')
        ->complete()
        ->complete()
        ->addGroupBuilderAdditionalSettings()
        ->addParameterCheckbox('TEST_AdditionalSettings', 'Тест AdditionalSettings')
        ->complete()
        ->complete()
        ->addGroupBuilderAjaxSettings()
        ->addParameterCheckbox('TEST_AjaxSettings', 'Тест AjaxSettings')
        ->complete()
        ->complete()
        ->addGroupBuilderCacheSettings()
        ->addParameterCheckbox('TEST_CacheSettings', 'Тест CacheSettings')
        ->complete()
        ->complete()
        ->addGroupBuilderDataSource()
        ->addParameterCheckbox('TEST_DataSource', 'Тест DataSource')
        ->complete()
        ->complete()
        ->addGroupBuilderUserConsent()
        ->addParameterCheckbox('TEST_UserConsent', 'Тест UserConsent')
        ->complete()
        ->complete()
        ->addGroupBuilderVisual()
        ->addParameterCheckbox('TEST_Visual', 'Тест Visual')
        ->complete()
        ->complete()
    ;

    $arComponentParameters = $builder->create();
}
catch (Main\LoaderException $e)
{
	ShowError($e->getMessage());
}
?>