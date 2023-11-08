<?php

namespace App\Http\Controllers;

use App\Http\Resources\DigimonResource;
use App\Http\Resources\DigimonResourceCollection;
use App\Models\DigimonDTO;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DigimonController extends Controller
{
    use \App\Traits\DigimonTrait;
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = 20;

        $digimonData = $this->getDigimonList($page, $pageSize);
        //convertir los datos en un DigimonDTO
        $digimonDTOs = collect($digimonData->items())->map(function ($item) {
            return new DigimonDTO($item);
        });
        //convertir los datos en un DigimonResourceCollection
        $formattedData = new DigimonResourceCollection($digimonDTOs);

        return response()->json($formattedData, Response::HTTP_OK);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $digimonDetail = $this->getDigimonById($id);
        $digimonDTO = new DigimonDTO($digimonDetail);
        return response()->json(['message' => 'Se encontró el siguiente elemento', 'results' => new DigimonResource($digimonDTO)],  Response::HTTP_OK);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
