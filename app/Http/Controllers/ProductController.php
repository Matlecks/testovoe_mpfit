<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('pages.products.index', compact('products'));
    }

    public function show($id)
    {
        try {
            $data = $this->productService->getProduct($id);

            return view('pages.products.show', $data);
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->productService->getProduct($id);

            return view('pages.products.edit', $data);
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $validated = $request->validated();

        try {
            $this->productService->updateProduct($id, $validated);

            $message = "Товар отредактирован";
            return redirect()->route('product.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $categories = $this->productService->getCategories();

        return view('pages.products.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        try {
            $this->productService->storeProduct($validated);

            $message = "Товар создан";
            return redirect()->route('product.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->productService->destroyProduct($id);

            $message = "Товар удален";
            return redirect()->route('product.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }
}
