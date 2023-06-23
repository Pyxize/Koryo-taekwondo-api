<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PoomseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'codified_name' => $this->resource->codified_fight,
            'name' => $this->resource->name,
            'techniques' => TechniqueResource::collection($this->resource->techniques)
        ];
    }
}
