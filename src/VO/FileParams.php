<?php

namespace Rekuital\BitrixComponentParameters\VO;

use Rekuital\BitrixComponentParameters\Enum\FileTargetTypeEnum;

class FileParams
{
    /**
     * @param FileTargetTypeEnum $target
     * @param string[] $extensions
     * @param bool $isUpload
     * @param bool $isMediaLib
     * @param string[] $mediaLibTypes
     */
    public function __construct(
        protected FileTargetTypeEnum $target,
        protected array $extensions,
        protected bool $isUpload,
        protected bool $isMediaLib,
        protected array $mediaLibTypes,
    ) {
    }

    public function getTarget(): FileTargetTypeEnum
    {
        return $this->target;
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }

    public function getExtensionsAsString(): string
    {
        return implode(',', $this->extensions);
    }

    public function isUpload(): bool
    {
        return $this->isUpload;
    }

    public function isMediaLib(): bool
    {
        return $this->isMediaLib;
    }

    public function getMediaLibTypes(): array
    {
        return $this->mediaLibTypes;
    }
}