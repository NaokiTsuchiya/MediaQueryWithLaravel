<?php

declare(strict_types=1);

namespace NaokiTsuchiya\Modules\User;

class User
{
    /** @var UserItemInterface */
    private $userItem;

    public function __construct(UserItemInterface $userItem)
    {
        $this->userItem = $userItem;
    }

    public function get(string $id): array
    {
        return ($this->userItem)($id);
    }
}
