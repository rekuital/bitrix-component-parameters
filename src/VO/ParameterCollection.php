<?php

namespace Rekuital\BitrixComponentParameters\VO;

use Rekuital\BitrixComponentParameters\Internal\Collection;

/**
 * @implements Collection<int, Parameter>
 */
class ParameterCollection extends Collection
{
    public function __construct(array $items = [])
    {
        parent::__construct(Parameter::class, $items);
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->items as $parameter) {
            $result[$parameter->getParameterCode()] = $parameter->toArray();
        }

        return $result;
    }
}