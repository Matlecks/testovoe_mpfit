<?php

namespace App\Services;


use App\Models\Category;
use App\Models\Product;

class ProductService
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProduct($id)
    {
        $product = Product::find($id);

        $categories = Category::where('id', '!=', $product->category->id)->get();

        return ['product' => $product, 'categories' => $categories];
    }

    public function updateProduct($id, array $validatedData)
    {
        $product = Product::find($id);
        $product->update($validatedData);
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function storeProduct(array $validatedData)
    {
        return Product::create($validatedData);
    }

    public function destroyProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
