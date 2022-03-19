<?php

namespace App\Repositories;

use App\Models\Display;
use App\Models\Photo;
use App\Repositories\Contracts\PhotoRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PhotoRepository extends BaseRepository implements PhotoRepositoryInterface
{
    public function __construct(Photo $model)
    {
        parent::__construct($model);
    }

    public function upload(Display $display, UploadedFile $photo)
    {
        return $display->photos()->create([
            'path' => Storage::url($photo->store('displays', 'public'))
        ]);
    }
}
