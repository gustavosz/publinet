<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDisplayRequest;
use App\Http\Requests\EditDisplayRequest;
use App\Http\Resources\DisplayCollection;
use App\Http\Resources\DisplayResource;
use App\Models\Display;
use App\Repositories\Contracts\DisplayRepositoryInterface;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    /**
     * @var DisplayRepositoryInterface
     */
    private $displayRepository;

    public function __construct(DisplayRepositoryInterface $displayRepository)
    {
        $this->displayRepository = $displayRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $displays = $this->displayRepository->getAll($request);

        return new DisplayCollection($displays);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDisplayRequest $request)
    {
        $data = $request->validated();

        $display = $this->displayRepository->create($data);

        return (new DisplayResource($display))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Display $display)
    {
        return new DisplayResource($display);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditDisplayRequest $request, Display $display)
    {
        $data = $request->validated();

        $this->displayRepository->update($display->id, $data);

        return response()->json()->setStatusCode(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Display $display)
    {
        $this->displayRepository->delete($display->id);

        return response()->json()->setStatusCode(204);
    }
}
