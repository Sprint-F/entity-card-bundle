<?php

declare(strict_types=1);

namespace SprintF\Bundle\EntityCard;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SprintFEntityCardBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
