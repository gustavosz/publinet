<?php

namespace App\Repositories\Contracts;

use App\Models\Display;
use Illuminate\Http\UploadedFile;

interface PhotoRepositoryInterface extends BaseRepositoryInterface
{
    public function upload(Display $display, UploadedFile $photo);
}
