@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">
            <form action="{{ route('purchase.update', $id = $purchase->id) }}" method="POST">
                @csrf
                <label class="w-100 mb-3" for="">ID : {{ $purchase->id }}</label>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">ФИО</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                           value="{{ $purchase->customer_name }}" name="customer_name">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Товар</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                           value="{{ $purchase->product->name }}" name="product_id" disabled>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Количество</span>
                    <input type="number" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                           value="{{ $purchase->quantity }}" name="quantity">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Итоговая цена</span>
                    <input type="number" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                           value="{{ $purchase->total_price }}" name="total_price" disabled>
                </div>

                <div class="form-floating mb-3">
                    <textarea name="comment" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px">
                            {{ $purchase->comment }}
                    </textarea>
                    <label for="floatingTextarea2">Комментарий</label>
                </div>

                <button type="submit" class="btn btn-outline-success mt-5">Сохранить</button>
            </form>
        </div>
    </section>
@endsection
