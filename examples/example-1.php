<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

global $APPLICATION;

$APPLICATION->IncludeComponent('project:test.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
