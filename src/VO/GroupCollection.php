<?php

namespace Rekuital\BitrixComponentParameters\VO;

use Rekuital\BitrixComponentParameters\Internal\Collection;

/**
 * @implements Collection<int, Group>
 */
class GroupCollection extends Collection
{
    /**
     * @param Group[] $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct(Group::class, $items);
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->items as $group) {
            $result[$group->getCode()] = [
                'NAME' => $group->getName(),
                'SORT' => $group->getSort(),
            ];
        }

        return $result;
    }
}