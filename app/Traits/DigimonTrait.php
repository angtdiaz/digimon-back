<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait DigimonTrait
{
    public function getDigimonList($page, $pageSize)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', "https://digi-api.com/api/v1/digimon", [
                'query' => [
                    'page' => $page,
                    'pageSize' => $pageSize,
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            if (!isset($data['content'])) {
                Log::error("Respuesta inesperada de la API: " . json_encode($data));
                return null;
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
            return null;
        }
    }

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
