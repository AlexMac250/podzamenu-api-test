<?php

namespace App\Model\DTO\TMParts;

use JMS\Serializer\Annotation as Serializer;

class StockDTO
{
    private string $brand;
    private string $article;

    /**
     * @var WarehouseOfferDTO[]
     *
     * @Serializer\Type("array<App\Model\DTO\TMParts\WarehouseOfferDTO>")
     */
    private array $warehouseOffers = [];

    /**
     * @return $this
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return $this
     */
    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @return $this
     */
    public function setWarehouseOffers(array $warehouseOffers): self
    {
        $this->warehouseOffers = $warehouseOffers;

        return $this;
    }

    public function getWarehouseOffers(): array
    {
        return $this->warehouseOffers;
    }
}
