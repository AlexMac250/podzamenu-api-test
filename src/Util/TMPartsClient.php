<?php

namespace App\Util;

use App\DependencyInjection\InjectionTrait\SerializerInjectionTrait;
use App\Exception\UnexpectedResponseException;
use App\Model\DTO\TMParts\StockByArticleResponseDTO;
use App\Model\DTO\TMParts\StockDTO;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class TMPartsClient
{
    use SerializerInjectionTrait;

    private Client $client;

    public function __construct(string $baseUri, string $bearerToken)
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
            RequestOptions::HEADERS => [
                'Authorization' => "Bearer {$bearerToken}",
            ],
        ]);
    }

    /**
     * @return StockDTO[]
     *
     * @throws GuzzleException
     * @throws UnexpectedResponseException
     */
    public function getStockByArticle(string $article): array
    {
        $response = $this->request('GET', 'StockByArticle', [
            'Article' => $article,
        ]);

        /** @var StockByArticleResponseDTO $result */
        $result = $this->handleJson($response->getBody()->getContents(), StockByArticleResponseDTO::class);

        return $result->getStocks();
    }

    /**
     * @throws GuzzleException
     */
    private function request(string $method, UriInterface|string $uri, array $body, array $options = []): ResponseInterface
    {
        return $this->client->request($method, $uri, [
            ...$options, [
                'json' => $body,
            ],
        ]);
    }

    /**
     * @throws UnexpectedResponseException
     */
    private function handleJson(string $jsonData, string $dataClass): mixed
    {
        try {
            return $this->serializer->deserialize($jsonData, $dataClass, 'json');
        } catch (\RuntimeException $e) {
            throw new UnexpectedResponseException(previous: $e);
        }
    }
}
