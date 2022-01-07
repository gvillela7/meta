<?php

namespace App\Services;

use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryService
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listAllCategories(): object
    {
        return $this->categoryRepository->allCategories();
    }

    public function listAllSubCategories(): object
    {
        return $this->categoryRepository->allSubCategories();
    }

    public function create(Request $request): object
    {
        return $this->categoryRepository->save($request->all());
    }

    public function view(): object
    {
        return $this->categoryRepository->find();
    }

    public function update(Request $request): bool
    {
        $id = $request->input('id');
        return $this->categoryRepository->update($id, $request->all());
    }
    public function delete($id): bool
    {
        return $this->categoryRepository->delete($id);
    }
}
