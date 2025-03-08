<?php

// src/Controller/ApiProductController.php
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Knp\Component\Pager\PaginatorInterface;

class ApiProductController extends AbstractController
{
    #[Route('/api/products', name: 'api_products', methods: ['GET'])]
    public function getProducts(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request, SerializerInterface $serializer): JsonResponse
    {
        $query = $entityManager->getRepository(Product::class)->createQueryBuilder('p')->getQuery();
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 10);
        
        return new JsonResponse($serializer->serialize($pagination->getItems(), 'json', ['groups' => 'product:list']), json: true);
    }

    #[Route('/api/products/{id}', name: 'api_product_detail', methods: ['GET'])]
    public function getProduct(Product $product, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse($serializer->serialize($product, 'json', ['groups' => 'product:detail']), json: true);
    }
}

