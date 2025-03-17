@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">
            <label class="w-100 mb-3" for="">ID : {{ $product->id }}</label>

            <div class="d-flex border border-secondary border-2 rounded mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                <div>{{ $product->name }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded mb-3">
                <span class="input-group-text">Описание</span>
                <div>{{ $product->description }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                <div>{{ $product->price }}</div>
            </div>

            <div class="d-flex border border-secondary border-2 rounded w-25">
                <span class="input-group-text">Категория</span>
                <div>{{ $product->category->name }}</div>
            </div>

            <div class="accordion mt-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Оформить заказ
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <form action="{{ route('purchase.store') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">ФИО</span>
                                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                                           value="" name="customer_name">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Количество</span>
                                    <input type="number" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                                           value="" name="quantity">
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea name="comment" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px">
                                    </textarea>
                                    <label for="floatingTextarea2">Комментарий</label>
                                </div>
                                <input name="product_id" type="hidden" value="{{ $product->id }}">
                                <button class="btn btn-outline-success" type="submit">
                                    Оформить заказ
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
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
