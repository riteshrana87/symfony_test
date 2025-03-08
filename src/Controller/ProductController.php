<?php

// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class ProductController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home()
    {
        return $this->render('home.html.twig');
    }

    #[Route('/products', name: 'product_list')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request)
    {
        $query = $entityManager->getRepository(Product::class)->createQueryBuilder('p')->getQuery();
        $products = $paginator->paginate($query, $request->query->getInt('page', 1), 10);

        return $this->render('product/index.html.twig', ['products' => $products]);
    }

    #[Route('/products/{id}', name: 'product_detail')]
    public function detail(Product $product)
    {
        return $this->render('product/detail.html.twig', ['product' => $product]);
    }
}

