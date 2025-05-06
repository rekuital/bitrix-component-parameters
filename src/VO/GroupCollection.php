<?php

namespace Rekuital\BitrixComponentParameters\VO;

use Rekuital\BitrixComponentParameters\Internal\Collection;

/**
 * @implements Collection<int|string|null, Group>
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
}