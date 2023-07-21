<?php

namespace App\Model;

use App\Model\DTO\TMParts\StockDTO;

class Product
{
    private string $brand;
    private string $article;
    private string $name;
    private string $quantity;
    private string $price;
    private string $deliveryDuration;
    private string $vendorId;
    private string $warehouseAlias;

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
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * @return $this
     */
    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return $this
     */
    public function setDeliveryDuration(string $deliveryDuration): self
    {
        $this->deliveryDuration = $deliveryDuration;

        return $this;
    }

    public function getDeliveryDuration(): string
    {
        return $this->deliveryDuration;
    }

    /**
     * @return $this
     */
    public function setVendorId(string $vendorId): self
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    public function getVendorId(): string
    {
        return $this->vendorId;
    }

    /**
     * @return $this
     */
    public function setWarehouseAlias(string $warehouseAlias): self
    {
        $this->warehouseAlias = $warehouseAlias;

        return $this;
    }

    public function getWarehouseAlias(): string
    {
        return $this->warehouseAlias;
    }

    /**
     * @return self[]
     */
    public static function createProductsFromStockDTO(StockDTO $stockDTO): array
    {
        $products = [];

        foreach ($stockDTO->getWarehouseOffers() as $warehouseOffer) {
            $products[] = (new self())
                ->setArticle($stockDTO->getArticle())
                ->setBrand($stockDTO->getBrand())
                ->setName($warehouseOffer->getName())
                ->setPrice($warehouseOffer->getPrice() * 100)
                ->setQuantity($warehouseOffer->getQuantity())
                ->setDeliveryDuration($warehouseOffer->getDeliveryPeriod() * 24 * 60 * 60)
                ->setVendorId($warehouseOffer->getId())
                ->setWarehouseAlias($warehouseOffer->getWarehouseCode())
            ;
        }

        return $products;
    }
}
