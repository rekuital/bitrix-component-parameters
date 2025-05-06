<?php

namespace Rekuital\BitrixComponentParameters\VO;

class Group
{
    public function __construct(
        protected string $code,
        protected string $name,
        protected int $sort,
    ) {
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSort(): int
    {
        return $this->sort;
    }
}