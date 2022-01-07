<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index($idStore): JsonResponse
    {
        $categories = $this->categoryService->listAllSubCategories($idStore);
        return response()->json([
            'subCategories' => $categories,
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
