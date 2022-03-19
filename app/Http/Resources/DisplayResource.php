<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisplayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
            'type'      => $this->type,
            'price'     => $this->price,
            'company'   => $this->when(
                $this->relationLoaded('company'),
                function () {
                    return new CompanyResource($this->company);
                }
            )
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
