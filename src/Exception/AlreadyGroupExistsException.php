<?php

namespace Rekuital\BitrixComponentParameters\Exception;

class AlreadyGroupExistsException extends ComponentParametersException
{
    public function __construct(string $groupCode)
    {
        parent::__construct("The group with the code \"$groupCode\" already exists");
    }
}