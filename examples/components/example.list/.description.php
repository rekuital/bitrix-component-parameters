<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
    'NAME' => Loc::getMessage('EXAMPLE_LIST_DESCRIPTION_NAME'),
    'DESCRIPTION' => Loc::getMessage('EXAMPLE_LIST_DESCRIPTION_DESCRIPTION'),
    'SORT' => 10,
    'PATH' => [
        'ID' => 'example',
        'NAME' => Loc::getMessage('EXAMPLE_LIST_DESCRIPTION_DIR'),
        'SORT' => 10,
    ],
];
