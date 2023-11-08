<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DigimonResourceCollection extends ResourceCollection
{
    public $collects = DigimonResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Se encontraron ' . count($this->collection) . ' elementos',
            'results' => $this->collection,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(200);
    }
}
