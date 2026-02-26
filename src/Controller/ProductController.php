<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->redirectToRoute('product_list');
    }

    #[Route('/products', name: 'product_list')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/products/seed', name: 'product_seed')]
    public function seed(EntityManagerInterface $em): Response
    {
        $data = [
            ['Laptop', '999.99', 'A powerful laptop'],
            ['Mouse', '29.99', 'Wireless ergonomic mouse'],
            ['Keyboard', '79.99', 'Mechanical keyboard'],
            ['Monitor', '399.99', '4K 27-inch monitor'],
        ];

        foreach ($data as [$name, $price, $desc]) {
            $product = new Product();
            $product->setName($name)->setPrice($price)->setDescription($desc);
            $em->persist($product);
        }

        $em->flush();

        return $this->redirectToRoute('product_list');
    }
}
