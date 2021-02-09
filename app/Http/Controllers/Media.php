<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use NaokiTsuchiya\Modules\User\User;

class Media extends Controller
{
    /** @var User */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(): JsonResponse
    {
        return response()->json($this->user->get('1'));
    }
}
