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

    /** Что можно будет выбирать в параметры файлы, директории или и то и другое */
    protected const FD_TARGET = 'FD_TARGET';

    /** Список допустимых расширений файлов для выбора из структуры сайта (через запятую) */
	protected const FD_EXT = 'FD_EXT';

    /** Разрешено ли использовать данные из структуры сайта */
	protected const FD_UPLOAD = 'FD_UPLOAD';

    /** Разрешено ли использовать данные из медиабиблиотеки */
	protected const FD_USE_MEDIA_LIB = 'FD_USE_MEDIALIB';

    /** Типы коллекций, которые будут доступны в медиабиблиотеки */
	protected const FD_MEDIA_LIB_TYPES = 'FD_MEDIALIB_TYPES';

    /** Файл с JS кодом ответственным за отображение кастомной опции */
    protected const JS_FILE = 'JS_FILE';

    /** Callback функция, которая будет вызвана после загрузки JS_FILE */
    protected const JS_EVENT = 'JS_EVENT';

    /** Дополнительные данные, передаваемые в JS_EVENT */
    protected const JS_DATA = 'JS_DATA';

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
        protected ?CustomParams $customParams = null,
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
            self::JS_FILE => $this->customParams?->getJsFile(),
            self::JS_EVENT => $this->customParams?->getJsEvent(),
            self::JS_DATA => $this->customParams?->getJsData(),
        ], fn ($item) => !is_null($item));
    }
}