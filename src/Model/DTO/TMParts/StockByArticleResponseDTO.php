<?php

namespace App\Model\DTO\TMParts;

use JMS\Serializer\Annotation as Serializer;

class StockByArticleResponseDTO
{
    /**
     * @var StockDTO[]
     *
     * @Serializer\Inline()
     *
     * @Serializer\Type("array<App\Model\DTO\TMParts\StockDTO>")
     */
    public array $stocks = [];

    /**
     * @return $this
     */
    public function setStocks(array $stocks): self
    {
        $this->stocks = $stocks;

        return $this;
    }

    public function getStocks(): array
    {
        return $this->stocks;
    }
}
