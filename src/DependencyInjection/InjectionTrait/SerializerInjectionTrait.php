<?php

namespace App\DependencyInjection\InjectionTrait;

use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait SerializerInjectionTrait
{
    protected SerializerInterface $serializer;

    #[Required]
    public function setSerializer(SerializerInterface $serializer): self
    {
        $this->serializer = $serializer;

        return $this;
    }
}
