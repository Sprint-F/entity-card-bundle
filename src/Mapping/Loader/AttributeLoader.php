<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard\Mapping\Loader;

use SprintF\Bundle\EntityCard\Attribute\Card;
use SprintF\Bundle\EntityCard\Attribute\CardRow;
use SprintF\Bundle\EntityCard\Mapping\ClassMetadata;
use SprintF\Bundle\EntityCard\Mapping\PropertyMetadata;
use SprintF\Metadata\Mapping\Loader\AttributeLoader as AttributeLoaderAbstract;

class AttributeLoader extends AttributeLoaderAbstract
{
    protected static function getKnownAttributes(int $target): array
    {
        return [
            \Attribute::TARGET_CLASS => [Card::class],
            \Attribute::TARGET_PROPERTY => [CardRow::class],
            \Attribute::TARGET_METHOD => [CardRow::class],
        ][$target];
    }

    protected static function getClassMetadataClass(): string
    {
        return ClassMetadata::class;
    }

    protected static function getPropertyMetadataClass(): string
    {
        return PropertyMetadata::class;
    }
}
