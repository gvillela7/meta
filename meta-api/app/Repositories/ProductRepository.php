<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\Category;

class ProductRepository implements ProductRepositoryInterface
{
    protected Category $category;
    protected Product $product;

    public function __construct(Product $product, Category $category)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function listAll(): object
    {
        return Product::with('category')->get();
    }

    public function save(array $data): object
    {
        $category_id = $data['category_id'];
        $category = $this->category->find($category_id);
        return $category->product()->create($data);
    }
    public function search(array $data): object
    {
        return Product::with('category')
            ->where('name','LIKE','%'.$data['search'].'%')
            ->get();
    }
    public function find(int $id): ?object
    {
        $result = $this->product->with('category')
            ->where('id', '=', $id)
            ->get();
        if ($result === null) {
            return null;
        }
        return $result;
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->product->find($id)->update($attributes);
    }

    public function delete(int $id): bool
    {
        return $this->product->find($id)->delete();
    }
}
