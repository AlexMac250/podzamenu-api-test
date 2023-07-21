<?php

namespace App\Repository;

use App\DependencyInjection\InjectionTrait\TMPartsClientInjectionTrait;
use App\Exception\UnexpectedResponseException;
use App\Model\Product;
use GuzzleHttp\Exception\GuzzleException;

class TMPartsRepository
{
    use TMPartsClientInjectionTrait;

    /**
     * @return null|Product[]
     *
     * @throws UnexpectedResponseException
     * @throws GuzzleException
     */
    public function getProductsByArticle(string $article): ?array
    {
        $products = [];

        $stockDTOs = $this->tmPartsClient->getStockByArticle($article);

        foreach ($stockDTOs as $stockDTO) {
            $products = [...$products, ...Product::createProductsFromStockDTO($stockDTO)];
        }

        return $products;
    }
}
