<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\SwitchStatusPurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Services\PurchaseService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    protected $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function index()
    {
        $purchases = $this->purchaseService->getAllPurchases();
        return view('pages.purchases.index', compact('purchases'));
    }

    public function show($id)
    {
        try {
            $data = $this->purchaseService->getPurchase($id);

            return view('pages.purchases.show', $data);
        } catch (\Exception $e) {
            return redirect()->route('purchase.index')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->purchaseService->getPurchase($id);

            return view('pages.purchases.edit', $data);
        } catch (\Exception $e) {
            return redirect()->route('purchase.index')->with('error', $e->getMessage());
        }
    }

    public function update(UpdatePurchaseRequest $request, $id)
    {
        $validated = $request->validated();

        try {
            $this->purchaseService->updatePurchase($id, $validated);

            $message = "Заказ отредактирован";
            return redirect()->route('purchase.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('purchase.index')->with('error', $e->getMessage());
        }
    }

    public function store(StorePurchaseRequest $request)
    {
        $validated = $request->validated();

        try {
            $this->purchaseService->storePurchase($validated);

            $message = "Заказ создан";
            return redirect()->route('product.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->purchaseService->destroyPurchase($id);
            $message = "Заказ удален";
            return redirect()->route('purchase.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('purchase.index')->with('error', $e->getMessage());
        }
    }

    public function switchStatus(SwitchStatusPurchaseRequest $request, $id)
    {
        $validated = $request->validated();

        try {
            $this->purchaseService->switchStatus($validated, $id);

            $message = "Заказ создан";
            return redirect()->route('purchase.index')->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->route('purchase.index')->with('error', $e->getMessage());
        }
    }
}
