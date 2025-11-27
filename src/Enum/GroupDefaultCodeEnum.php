<?php

namespace Rekuital\BitrixComponentParameters\Enum;

enum GroupDefaultCodeEnum: string
{
    /** Основные параметры - Базовые параметры для работы компонента */
    case BASE = 'BASE';

    /** Источник данных - Параметры, указывающие, откуда выбирать данные для компонента */
    case DATA_SOURCE = 'DATA_SOURCE';

    /** Настройки внешнего вида - Предполагается размещать параметры, отвечающие за внешний вид */
    case VISUAL = 'VISUAL';

    /** Согласие пользователя - Настройка параметров на получение согласия пользователя, согласно законодательству РФ */
    case USER_CONSENT = 'USER_CONSENT';

    /** Шаблоны ссылок - Служебная */
    case URL_TEMPLATES = 'URL_TEMPLATES';

    /** Управление адресами страниц - Группа для всех параметров, связанных с использованием ЧПУ */
    case SEF_MODE = 'SEF_MODE';

    /** Управление режимом AJAX - Все, что касается ajax */
    case AJAX_SETTINGS = 'AJAX_SETTINGS';

    /** Настройки кеширования - Появляется при указании параметра CACHE_TIME */
    case CACHE_SETTINGS = 'CACHE_SETTINGS';

    /** Дополнительные настройки - Эта группа появляется, например, при указании параметра SET_TITLE */
    case ADDITIONAL_SETTINGS = 'ADDITIONAL_SETTINGS';

    public static function isDefaultGroup(string|GroupDefaultCodeEnum $code): bool
    {
        return in_array($code, array_map(fn($case) => $case->value, self::cases()));
    }
}