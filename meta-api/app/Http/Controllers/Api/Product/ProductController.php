<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function create(Request $request): JsonResponse
    {
        $product = $this->productService->create($request);
        return response()->json([
            'product' => $product,
        ], 200);
    }

    public function search(Request $request): JsonResponse
    {
        $search = $this->productService->search($request);
        return response()->json([
            'product' => $search
        ], 200);
    }

    public function list(): JsonResponse
    {
        $product = $this->productService->listAll();
        return response()->json([
            'product' => $product,
        ], 200);
    }

    public function view($product_id): JsonResponse
    {
        if ($product_id === null){
            $product = 'Parametro de consulta inválido.';
        }
        $product = $this->productService->view($product_id);
        if (!$product) {
            $product = 'Nenhum produto encontrado';
        }
        return response()->json([
            'product' => $product,
        ], 200);
    }
    public function update(Request $request): JsonResponse
    {
        $product = $this->productService->update($request);
        return response()->json([
            'product' => $product,
        ], 200);
    }
    public function delete($product_id): JsonResponse
    {
        $response = $this->productService->delete($product_id);
        return response()->json([
            'result' => $response,
        ], 200);
    }
}
