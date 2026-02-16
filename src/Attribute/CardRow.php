<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard\Attribute;

use SprintF\Metadata\Mapping\Attribute\MetadataAttribute;
use SprintF\ValueObjects\Value\DefaultValue;

/**
 * Атрибут, применяемый к свойству или геттеру данных сущности.
 * Задает параметры отображения строки карточки сущности.
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD)]
class CardRow extends MetadataAttribute
{
    public function __construct(
        /** @var ?string Отображаемое имя строки карточки сущности */
        public readonly ?string $label = null,
        /** @var int Порядок отображения строки в карточке сущности */
        public readonly int $order = 1,
        /** @var string Имя класса-значения для данных, отображаемых в строке карточки */
        public readonly string $valueClass = DefaultValue::class,
        /** @var bool Отображать ли строку, если значение данных пустое? */
        public readonly bool $showIfEmpty = true,
    ) {
    }

    public function getKey(): string
    {
        return 'row';
    }
}
