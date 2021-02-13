<?php

declare(strict_types=1);

namespace App\Providers;

use Ray\Di\InjectorInterface;

final class InjectorProxy
{
    /**
     * @var InjectorInterface
     */
    private $injector;

    public function __construct(InjectorInterface $injector)
    {
        $this->injector = $injector;
    }

    public function __invoke(string $classString)
    {
        return $this->injector->getInstance($classString);
    }
}
