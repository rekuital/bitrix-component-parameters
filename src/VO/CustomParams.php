<?php

namespace Rekuital\BitrixComponentParameters\VO;

class CustomParams
{
    public function __construct(
        protected ?string $jsFile,
        protected ?string $jsEvent,
        protected array|bool|int|string|null $jsData
    ) {
    }

    public function getJsFile(): ?string
    {
        return $this->jsFile;
    }

    public function getJsEvent(): ?string
    {
        return $this->jsEvent;
    }

    public function getJsData(): int|bool|array|string|null
    {
        return $this->jsData;
    }
}