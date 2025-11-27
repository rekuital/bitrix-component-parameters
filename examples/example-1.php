<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/bitrix-component-parameters/vendor/autoload.php");

global $APPLICATION;

$APPLICATION->IncludeComponent('project:example.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
