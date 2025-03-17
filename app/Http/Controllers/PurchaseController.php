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
        $data = $this->purchaseService->getPurchase($id);

        return view('pages.purchases.show', $data);
    }

    public function edit($id)
    {
        $data = $this->purchaseService->getPurchase($id);

        return view('pages.purchases.edit', $data);
    }

    public function update(UpdatePurchaseRequest $request, $id)
    {
        $validated = $request->validated();

        $this->purchaseService->updatePurchase($id, $validated);

        $message = "Заказ отредактирован";
        return redirect()->route('purchase.index')->with('message', $message);
    }

    public function store(StorePurchaseRequest $request)
    {
        $validated = $request->validated();

        $this->purchaseService->storePurchase($validated);

        $message = "Заказ создан";
        return redirect()->route('product.index')->with('message', $message);
    }

    public function destroy($id)
    {
        $this->purchaseService->destroyPurchase($id);

        $message = "Заказ удален";
        return redirect()->route('product.index')->with('message', $message);
    }

    public function switchStatus(SwitchStatusPurchaseRequest $request, $id)
    {
        $validated = $request->validated();

        $this->purchaseService->switchStatus($validated, $id);

        $message = "Заказ создан";
        return redirect()->route('purchase.index')->with('message', $message);

    }
}
