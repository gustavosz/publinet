<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadPhotoRequest;
use App\Http\Resources\PhotoResource;
use App\Models\Display;
use App\Repositories\Contracts\PhotoRepositoryInterface;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * @var PhotoRepositoryInterface
     */
    private $photoRepository;

    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadPhotoRequest $request, Display $display)
    {
        $data = $request->validated();

        $photo = $this->photoRepository->upload($display, $data['photo']);

        return (new PhotoResource($photo))->response()->setStatusCode(201);
    }
}
