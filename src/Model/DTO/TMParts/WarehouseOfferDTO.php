<?php

namespace App\Model\DTO\TMParts;

class WarehouseOfferDTO
{
    private string $id;
    private float $price;
    private string $quantity;
    private int $deliveryPeriod;
    private string $warehouseCode;
    private string $name;

    /**
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
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
    public function setDeliveryPeriod(int $deliveryPeriod): self
    {
        $this->deliveryPeriod = $deliveryPeriod;

        return $this;
    }

    public function getDeliveryPeriod(): int
    {
        return $this->deliveryPeriod;
    }

    /**
     * @return $this
     */
    public function setWarehouseCode(string $warehouseCode): self
    {
        $this->warehouseCode = $warehouseCode;

        return $this;
    }

    public function getWarehouseCode(): string
    {
        return $this->warehouseCode;
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
}
