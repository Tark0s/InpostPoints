<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\DTO\InpostResourcesResponse;

class InpostService
{
    private HttpClientInterface $httpClient;
    private SerializerInterface $serializer;

    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer)
    {
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    public function getInpostResources(
        string $resources,
        string $city,
        ?string $street = null,
        ?string $postCode = null
    ): ?InpostResourcesResponse
    {
        $city = ucfirst(strtolower($city));
        $url = "https://api-shipx-pl.easypack24.net/v1/{$resources}?city={$city}";

        try {
            $response = $this->httpClient->request('GET', $url);
            $data = $response->getContent();

            $resourcesResponse = $this->serializer->deserialize($data, InpostResourcesResponse::class, 'json');

            if (null !== $street){
                $resourcesResponse->filterByStreet($street);
            }

            if (null !== $postCode){
                $resourcesResponse->filterByPostCode($postCode);
            }

            return $resourcesResponse;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
