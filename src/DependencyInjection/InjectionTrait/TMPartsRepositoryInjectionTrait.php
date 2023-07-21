<?php

namespace App\DependencyInjection\InjectionTrait;

use App\Repository\TMPartsRepository;
use Symfony\Contracts\Service\Attribute\Required;

trait TMPartsRepositoryInjectionTrait
{
    protected TMPartsRepository $TMPartsRepository;

    #[Required]
    public function setTMPartsRepository(TMPartsRepository $TMPartsRepository): self
    {
        $this->TMPartsRepository = $TMPartsRepository;

        return $this;
    }
}
