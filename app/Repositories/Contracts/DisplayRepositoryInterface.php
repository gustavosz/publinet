<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface DisplayRepositoryInterface extends BaseRepositoryInterface
{
    public function getAll(Request $request);
}
