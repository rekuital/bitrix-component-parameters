<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

class ExampleListComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($params): array
    {
        return $params;
    }
}
