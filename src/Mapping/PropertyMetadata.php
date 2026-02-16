<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard\Mapping;

use SprintF\Metadata\Mapping\Attribute\MetadataAttribute;
use SprintF\Metadata\Mapping\PropertyMetadata as PropertyMetadataAbstract;

class PropertyMetadata extends PropertyMetadataAbstract
{
    /**
     * @todo: Перенести метод в библиотеку Metadata
     */
    private function getDataValue(string $group, string $key)
    {
        return $this->data[$group][$key] ?? $this->data[MetadataAttribute::DEFAULT_GROUP][$key] ?? null;
    }

    public function getLabel(string $group = MetadataAttribute::DEFAULT_GROUP): string
    {
        return $this->getDataValue($group, 'row.label') ?? $this->getName();
    }

    public function getValueClass(string $group = MetadataAttribute::DEFAULT_GROUP): string
    {
        return $this->getDataValue($group, 'row.valueClass');
    }

    public function showIfEmpty(string $group = MetadataAttribute::DEFAULT_GROUP): bool
    {
        return $this->getDataValue($group, 'row.showIfEmpty');
    }

    public function getOrder(string $group = MetadataAttribute::DEFAULT_GROUP): int
    {
        return $this->getDataValue($group, 'row.order') ?? 0;
    }
}
