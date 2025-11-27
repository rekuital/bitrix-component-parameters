<?php

namespace Rekuital\BitrixComponentParameters\VO;

use Rekuital\BitrixComponentParameters\Enum\ParameterTypeEnum;

class Parameter
{
    /** Код группы, если нет - ставится ADDITIONAL_SETTINGS */
    protected const PARENT = 'PARENT';

    /** Название параметра на текущем языке */
	protected const NAME = 'NAME';

    /** Тип элемента управления, в котором будет устанавливаться параметр */
	protected const TYPE = 'TYPE';

    /** Перегружать настройки или нет после выбора (N/Y) */
	protected const REFRESH = 'REFRESH';

    /** Одиночное/множественное значение (N/Y) */
	protected const MULTIPLE = 'MULTIPLE';

    /** Массив значений для списка */
	protected const VALUES = 'VALUES';

    /** Показывать поле для значений, вводимых вручную (Y/N) */
	protected const ADDITIONAL_VALUES = 'ADDITIONAL_VALUES';

    /** Число строк для списка (если нужен не выпадающий список) */
	protected const SIZE = 'SIZE';

    /** Значение по умолчанию */
	protected const DEFAULT = 'DEFAULT';

    /** Ширина поля в символах */
	protected const COLS = 'COLS';

    protected const FD_TARGET = 'FD_TARGET';
	protected const FD_EXT = 'FD_EXT';
	protected const FD_UPLOAD = 'FD_UPLOAD';
	protected const FD_USE_MEDIA_LIB = 'FD_USE_MEDIALIB';
	protected const FD_MEDIA_LIB_TYPES = 'FD_MEDIALIB_TYPES';

    public function __construct(
        protected ?string $groupCode,
        protected string $parameterCode,
        protected ?string $name,
        protected ?ParameterTypeEnum $type,
        protected bool $isRefresh = false,
        protected bool $isMultiple = false,
        protected bool $hasAdditionalValue = false,
        protected string|array|null $defaultValue = null,
        protected ?int $widthField = null,
        protected ?array $values = null,
        protected ?int $size = null,
        protected ?FileParams $fileParams = null,
    ) {
    }

    public function getParameterCode(): string
    {
        return $this->parameterCode;
    }

    public function toArray(): array
    {
        return array_filter([
            self::PARENT => $this->groupCode,
            self::NAME => $this->name,
            self::TYPE => $this->type->value,
            self::REFRESH => $this->isRefresh ? 'Y' : null,
            self::MULTIPLE => $this->isMultiple ? 'Y' : null,
            self::VALUES => $this->values,
            self::ADDITIONAL_VALUES => $this->hasAdditionalValue ? 'Y' : null,
            self::SIZE => $this->size,
            self::DEFAULT => $this->defaultValue,
            self::COLS => $this->widthField,
            self::FD_TARGET => $this->fileParams?->getTarget()?->value,
            self::FD_EXT => $this->fileParams?->getExtensionsAsString(),
            self::FD_UPLOAD => $this->fileParams?->isUpload(),
            self::FD_USE_MEDIA_LIB => $this->fileParams?->isMediaLib(),
            self::FD_MEDIA_LIB_TYPES => $this->fileParams?->getMediaLibTypes(),
        ], fn ($item) => !is_null($item));
    }
}