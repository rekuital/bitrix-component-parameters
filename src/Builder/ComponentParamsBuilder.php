<?php

namespace Rekuital\BitrixComponentParameters\Builder;

use Rekuital\BitrixComponentParameters\Enum\GroupDefaultCodeEnum;
use Rekuital\BitrixComponentParameters\Exception\AlreadyGroupExistsException;
use Rekuital\BitrixComponentParameters\Exception\SystemGroupCodeException;
use Rekuital\BitrixComponentParameters\VO\Group;
use Rekuital\BitrixComponentParameters\VO\GroupCollection;

class ComponentParamsBuilder
{
    protected GroupCollection $groupCollection;

    public function __construct()
    {
        $this->groupCollection = new GroupCollection();
    }

    /**
     * @throws SystemGroupCodeException
     * @throws AlreadyGroupExistsException
     */
    public function addGroup(Group $group): static
    {
        if ($this->isSystemGroup($group)) {
            throw new SystemGroupCodeException($group->getCode());
        }

        foreach ($this->groupCollection as $item) {
            if ($item->getCode() === $group->getCode()) {
                throw new AlreadyGroupExistsException($group->getCode());
            }
        }

        $this->groupCollection[] = $group;

        return $this;
    }

    protected function isSystemGroup(Group $group): bool
    {
        foreach (GroupDefaultCodeEnum::cases() as $groupCode) {
            if ($group->getCode() === $groupCode->value) {
                return true;
            }
        }

        return false;
    }
}