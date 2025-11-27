<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

require_once realpath(__DIR__.'/../vendor/autoload.php');

global $APPLICATION;

$APPLICATION->IncludeComponent('project:example.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
