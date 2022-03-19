<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'country' => $this->country,
            'displays' => DisplayResource::collection($this->whenLoaded('displays'))
        ];
    }

    public function with($request)
    {
        return [
            'status' => true,
            'message' => 'Process is successfully completed',
        ];
    }
}
