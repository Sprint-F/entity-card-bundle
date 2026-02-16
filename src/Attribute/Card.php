<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard\Attribute;

use SprintF\Metadata\Mapping\Attribute\MetadataAttribute;

/**
 * Атрибут, применяющийся к классу сущности, которая будет отображаться в карточке.
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Card extends MetadataAttribute
{
    public function __construct(
        /** @var string Отображаемое имя сущности: заголовок карточки */
        public readonly string $entityLabel,
    ) {
    }

    public function getKey(): string
    {
        return 'card';
    }
}
