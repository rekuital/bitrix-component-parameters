<?php

namespace Rekuital\BitrixComponentParameters\Exception;

class SystemGroupCodeException extends ComponentParametersException
{
    public function __construct(string $groupCode)
    {
        parent::__construct("The group with the code \"$groupCode\" is a system group");
    }
}