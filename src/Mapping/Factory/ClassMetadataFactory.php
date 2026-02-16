<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard\Mapping\Factory;

use SprintF\Bundle\EntityCard\Mapping\ClassMetadata;
use SprintF\Bundle\EntityCard\Mapping\Loader\AttributeLoader;
use SprintF\Metadata\Mapping\Factory\ClassMetadataFactory as ClassMetadataFactoryAbstract;
use SprintF\Metadata\Mapping\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ClassMetadataFactory extends ClassMetadataFactoryAbstract
{
    public function __construct(
        #[Autowire(service: AttributeLoader::class)]
        protected readonly LoaderInterface $loader,
    ) {
    }

    public function getMetadataFor(string|object $value): ClassMetadata
    {
        return parent::getMetadataFor($value);
    }
}
