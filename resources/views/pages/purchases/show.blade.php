@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">
            <label class="w-100 mb-3" for="">ID : {{ $purchase->id }}</label>

            <div class="d-flex border border-secondary border-2 rounded mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">ФИО</span>
                <div>{{ $purchase->customer_name }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Статус</span>
                <div>{{ $purchase->status }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded w-25">
                <span class="input-group-text">Товар</span>
                <div>{{ $purchase->product->name }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded w-25">
                <span class="input-group-text">Количество</span>
                <div>{{ $purchase->quantity }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded w-25">
                <span class="input-group-text">Итоговая цена</span>
                <div>{{ $purchase->total_price }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded mb-3">
                <span class="input-group-text">Комментарий</span>
                <div>{{ $purchase->comment }}</div>
            </div>
        </div>
    </section>
    <style>
        .border {
            gap: 1.5rem;
            align-items: center;
        }

        .input-group-text {
            min-width: 100px;
        }
    </style>
@endsection
