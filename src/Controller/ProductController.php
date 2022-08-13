<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product')] // prefix for all routes in this controller
class ProductController extends AbstractController
{

    // we had param converter for id, ...
    #[Route('/', name: 'app_product_new', method: ['Post'])] // using app to specify the namespace
    // using type hinting for the parameter
    // dependency injection
    // save it with repository and get repository with type hinting
    public function new(Request $request, ProductRepository $repository): Response
    {
        // using dump to know what we have
        // dump($request);
        // dd($request); // dump and die
        // dd($request->toArray); // json
        // dd($request->request); // urlencoder

        // best way is to don't have code here and create
        // class for it and use it in controller

        $requestData = $request->toArray();
        $product = new Product(); // not good to have constructor with no parameters
        // set id in constructor
        $product->setTitle($requestData['title']);
        $product->setStock($requestData['stock']);
        // dd($product);

        $repository->add($product, true);

        return $this->json($product);
    }

    // #[Route('/', name: 'app_product_index', methods: ['GET'])]
    // public function index(ProductRepository $productRepository): Response
    // {
    //     return $this->render('product/index.html.twig', [
    //         'products' => $productRepository->findAll(),
    //     ]);
    // }

    // #[Route('/new', name: 'app_product_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, ProductRepository $productRepository): Response
    // {
    //     $product = new Product();
    //     $form = $this->createForm(ProductType::class, $product);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $productRepository->add($product, true);

    //         return $this->redirectToRoute('app_product_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('product/new.html.twig', [
    //         'product' => $product,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_product_show', methods: ['GET'])]
    // public function show(Product $product): Response
    // {
    //     return $this->render('product/show.html.twig', [
    //         'product' => $product,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_product_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Product $product, ProductRepository $productRepository): Response
    // {
    //     $form = $this->createForm(ProductType::class, $product);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $productRepository->add($product, true);

    //         return $this->redirectToRoute('app_product_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('product/edit.html.twig', [
    //         'product' => $product,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_product_delete', methods: ['POST'])]
    // public function delete(Request $request, Product $product, ProductRepository $productRepository): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
    //         $productRepository->remove($product, true);
    //     }

    //     return $this->redirectToRoute('app_product_index', [], Response::HTTP_SEE_OTHER);
    // }
}
