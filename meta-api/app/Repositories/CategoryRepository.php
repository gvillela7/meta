<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function allCategories(): object
    {
        return Category::with('product')->get();
    }

    public function allSubCategories(): object
    {
        return $this->category->whereNotNull('parent_id')->get();
    }

    public function save(array $attributes): object
    {
        return $this->category->create($attributes);
    }

}
