<?php

declare(strict_types=1);

namespace App\Common\EntityCard\Component;

use SprintF\Bundle\EntityCard\Mapping\ClassMetadata;
use SprintF\Bundle\EntityCard\Mapping\Factory\ClassMetadataFactory;
use SprintF\Metadata\Mapping\Attribute\MetadataAttribute;
use SprintF\ValueObjects\Value\AbstractValue;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

/**
 * Компонент, отображающий карточку сущности.
 */
#[AsTwigComponent(name: 'Entity:Card')]
class EntityCardComponent
{
    /**
     * Сущность, данные которой будут отображаться в карточке.
     */
    public object $entity;

    /**
     * Группа метаданных, по которым будет строиться карточка сущности.
     */
    public string $group = MetadataAttribute::DEFAULT_GROUP;

    public function __construct(
        private readonly PropertyAccessorInterface $propertyAccessor,
        private readonly ClassMetadataFactory $classMetadataFactory,
    ) {
    }

    /**
     * Метод, возвращающий метаданные сущности.
     */
    public function getMetadata(): ClassMetadata
    {
        return $this->classMetadataFactory->getMetadataFor($this->entity);
    }

    /**
     * Метод, получающий для заданного свойства в данной сущности его значение, в виде Value Object.
     */
    public function getPropertyValue($entity, string $property): AbstractValue
    {
        $valueClass = $this->getMetadata()->getPropertiesMetadata()[$property]->getValueClass();

        return new $valueClass($this->propertyAccessor->getValue($entity, $property));
    }
}
