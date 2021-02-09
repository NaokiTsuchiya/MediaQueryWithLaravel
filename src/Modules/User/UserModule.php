<?php

declare(strict_types=1);

namespace NaokiTsuchiya\Modules\User;

use Ray\AuraSqlModule\AuraSqlModule;
use Ray\Di\AbstractModule;
use Ray\MediaQuery\MediaQueryModule;

class UserModule extends AbstractModule
{
    /** @var string */
    private $sqlDir;
    private $dsn;

    public function __construct($sqlDir, $dsn)
    {
        $this->sqlDir = $sqlDir;
        $this->dsn = $dsn;
    }

    protected function configure()
    {
        $mediaQueries = [
            UserItemInterface::class,
        ];
        $this->install(new MediaQueryModule($this->sqlDir, $mediaQueries));
        $this->install(new AuraSqlModule($this->dsn));
    }
}
