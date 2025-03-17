<?php

namespace App\Services;


use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseService
{
    public function getAllPurchases()
    {
        return Purchase::all();
    }

    public function getPurchase($id)
    {
        $purchase = Purchase::find($id);

        return ['purchase' => $purchase];
    }

    public function updatePurchase($id, array $validatedData)
    {
        $purchase = Purchase::find($id);
        $purchase->update($validatedData);
    }

    public function storePurchase(array $validatedData)
    {
        $product = Product::find($validatedData['product_id']);

        if (!$product) {
            throw new \Exception('Product not found');
        }

        $validatedData['total_price'] = round($product->price * $validatedData['quantity'], 2);
        return Purchase::create($validatedData);
    }

    public function destroyPurchase($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
    }

    public function switchStatus(array $validatedData, $id)
    {
        $purchase = Purchase::find($id);
        $validatedData['status'] = $validatedData['status'] == 'new' ? 'complited' :  'new';
        $purchase->update($validatedData);
    }

}
