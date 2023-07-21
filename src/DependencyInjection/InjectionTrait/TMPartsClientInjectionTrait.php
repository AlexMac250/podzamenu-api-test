<?php

namespace App\DependencyInjection\InjectionTrait;

use App\Util\TMPartsClient;
use Symfony\Contracts\Service\Attribute\Required;

trait TMPartsClientInjectionTrait
{
    protected TMPartsClient $tmPartsClient;

    #[Required]
    public function setTmPartsClient(TMPartsClient $tmPartsClient): self
    {
        $this->tmPartsClient = $tmPartsClient;

        return $this;
    }
}
