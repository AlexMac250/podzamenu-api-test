<?php

namespace App\Controller;

use App\DependencyInjection\InjectionTrait\SerializerInjectionTrait;
use App\DependencyInjection\InjectionTrait\TMPartsRepositoryInjectionTrait;
use App\Exception\UnexpectedResponseException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    use TMPartsRepositoryInjectionTrait;
    use SerializerInjectionTrait;

    #[Route(name: 'app_index')]
    public function index(): Response
    {
        try {
            $serializedData = $this->serializer->serialize(
                $this->TMPartsRepository->getProductsByArticle('ARTICLE'),
                'json'
            );

            return new Response($serializedData, headers: [
                'Content-Type' => 'application/json',
            ]);
        } catch (UnexpectedResponseException $e) {
            return new Response(
                $this->serializer->serialize([
                    'exception' => [
                        'type' => $e::class,
                        'message' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                    ],
                ], 'json'),
                500,
                [
                    'Content-Type' => 'application/json',
                ]
            );
        }
    }
}
