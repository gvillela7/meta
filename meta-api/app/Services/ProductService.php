<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function listAll(): object
    {
        return $this->productRepository->listAll();
    }

    public function create(Request $request): object
    {
        return $this->productRepository->save($request->all());
    }

    public function search(Request $request): object
    {
        return $this->productRepository->search($request->all());
    }

    public function createFeatures(Request $request): ?object
    {
        return $this->productRepository->saveFeatures($request->all());
    }

    public function view($id): ?object
    {
        return $this->productRepository->find($id);
    }

    public function update(Request $request): bool
    {
        $id = $request->input('id');
        return $this->productRepository->update($id, $request->all());
    }
    public function delete($id): bool
    {
        return $this->productRepository->delete($id);
    }
}
