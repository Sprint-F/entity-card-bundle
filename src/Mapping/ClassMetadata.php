<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard\Mapping;

use SprintF\Metadata\Mapping\Attribute\MetadataAttribute;
use SprintF\Metadata\Mapping\ClassMetadata as ClassMetadataAbstract;

class ClassMetadata extends ClassMetadataAbstract
{
    /**
     * @todo: Перенести метод в библиотеку Metadata
     */
    private function getDataValue(string $group, string $key)
    {
        return $this->data[$group][$key] ?? $this->data[MetadataAttribute::DEFAULT_GROUP][$key] ?? null;
    }

    public function getEntityLabel(string $group = MetadataAttribute::DEFAULT_GROUP): string
    {
        return $this->getDataValue($group, 'card.entityLabel') ?: '';
    }

    public function getPropertiesMetadata(): array
    {
        $metadata = parent::getPropertiesMetadata();
        uasort($metadata, fn (PropertyMetadata $p1, PropertyMetadata $p2) => $p1->getOrder() <=> $p2->getOrder());

        return $metadata;
    }
}
