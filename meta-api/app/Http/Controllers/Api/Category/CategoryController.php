<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->listAllCategories();
        return response()->json([
            'categories' => $categories,
        ], 200);
    }

    public function list(): JsonResponse
    {
        $categories = $this->categoryService->listAllCategories();
        return response()->json([
            'categories' => $categories,
        ], 200);
    }

    public function create(Request $request): JsonResponse
    {
        $response = $this->categoryService->create($request);
        if (!$response) {
            return response()->json([
                'result' => false,
            ], 401);
        }
        return response()->json([
            'result' => $response,
        ], 200);
    }
}
