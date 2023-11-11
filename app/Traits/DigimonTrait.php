<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

trait DigimonTrait
{
    /**
     * Retrieves a list of Digimon from the Digi-API based on the given parameters.
     *
     * @param int $page The page number to retrieve.
     * @param int $pageSize The number of Digimon to retrieve per page.
     * @param string $name The name of the Digimon to search for.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator The paginated list of Digimon.
     */
    public function getDigimonList($page, $pageSize, $name)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', "https://digi-api.com/api/v1/digimon", [
                'query' => [
                    'page' => $page,
                    'pageSize' => $pageSize,
                    'name' => $name
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            if (!isset($data['content'])) {
                Log::error("Respuesta inesperada de la API: " . json_encode($data));
                return [];
            }
            $content = $data['content'];
            $paginator = new LengthAwarePaginator(
                $content,
                $data['pageable']['totalElements'],
                $pageSize,
                $page,
                ['path' => url()->current()]
            );
            return $paginator;
        } catch (GuzzleException $e) {
            Log::error("Error al obtener datos de la API: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Retrieves a Digimon by its ID from the Digi-API.
     *
     * @param int $id The ID of the Digimon to retrieve.
     *
     * @return array|null Returns an array with the Digimon data if successful, or null if an error occurred.
     */
    public function getDigimonById($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', "https://www.digi-api.com/api/v1/digimon/{$id}");
            $data = json_decode($response->getBody(), true);
            return $data;
        } catch (GuzzleException $e) {
            Log::error("Error al obtener datos del Digimon: " . $e->getMessage());
            return null;
        }
    }
}
