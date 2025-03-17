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

        if (!$purchase) {
            throw new \Exception('Purchase not found');
        }

        return ['purchase' => $purchase];
    }

    public function updatePurchase($id, array $validatedData)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            throw new \Exception('Purchase not found');
        }

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

        if (!$purchase) {
            throw new \Exception('Purchase not found');
        }

        $purchase->delete();
    }

    public function switchStatus(array $validatedData, $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            throw new \Exception('Purchase not found');
        }

        $validatedData['status'] = $validatedData['status'] == 'new' ? 'complited' :  'new';
        $purchase->update($validatedData);
    }

}
