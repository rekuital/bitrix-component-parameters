<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;
use Rekuital\BitrixComponentParameters\ComponentParameterFactory;

Loc::loadMessages(__FILE__);

try
{
	require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/bitrix-component-parameters/vendor/autoload.php");
    ComponentParameterFactory::createComponentParamsBuilder();
}
catch (Main\LoaderException $e)
{
	ShowError($e->getMessage());
}
?>