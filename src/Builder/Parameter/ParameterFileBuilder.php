<?php

namespace Rekuital\BitrixComponentParameters\Builder\Parameter;

use Rekuital\BitrixComponentParameters\Enum\FileTargetTypeEnum;
use Rekuital\BitrixComponentParameters\VO\FileParams;
use Rekuital\BitrixComponentParameters\VO\Parameter;

class ParameterFileBuilder extends ParameterBuilder
{
    protected ?FileTargetTypeEnum $target = null;
	protected array $extensions = [];
	protected array $mediaLibTypes = [];

    /**
     * Устанавливает что можно выбрать из структуры сайта (файл, папку или и то и другое)
     */
    public function setTarget(FileTargetTypeEnum $target): static
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Устанавливает какие расширения будут доступны для выбора из структуры сайта
     */
    public function setExtensions(array $extensions): static
    {
        $this->extensions = array_map('strval', $extensions);

        return $this;
    }

    /**
     * Добавляет расширение, которое будет доступно для выбора из структуры сайта
     */
    public function addExtension(string $extension): static
    {
        $this->extensions[] = $extension;

        return $this;
    }

    /**
     * Устанавливает какие типы медиабиблиотеки будут доступны для выбора файла
     */
    public function setMediaLibTypes(array $mediaLibTypes): static
    {
        $this->mediaLibTypes = array_map('strval', $mediaLibTypes);

        return $this;
    }

    /**
     * Добавляет тип медиабиблиотеки, который будет доступен для выбора файла
     */
    public function addMediaLibType(string $mediaLibType): static
    {
        $this->mediaLibTypes[] = $mediaLibType;

        return $this;
    }

    public function create(): Parameter
    {
        return new Parameter(
            groupCode: $this->groupCode,
            parameterCode: $this->parameterCode,
            name: $this->name,
            type: $this->type,
            fileParams: new FileParams(
                target: $this->target,
                extensions: $this->extensions,
                isUpload: true,
                isMediaLib: true,
                mediaLibTypes: $this->mediaLibTypes,
            ),
        );
    }
}