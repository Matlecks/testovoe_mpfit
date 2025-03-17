@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">

            <div class="button_group d-flex justify-content-end mb-4">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Номера заказа</th>
                    <th scope="col">ФИО покупателя</th>
                    <th scope="col">Статуса заказа</th>
                    <th scope="col">Итоговой цены</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <th scope="row">{{ $purchase->id }}</th>
                        <td>{{ $purchase->customer_name }}</td>
                        <td>
                            <form action="{{route('purchase.switchStatus', $id = $purchase->id)}}" method="POST" class="mb-0">
                                @csrf
                                <input type="hidden" name="status" value="{{$purchase->status}}">
                                <button type="submit" class="btn
                                    @switch($purchase->status)
                                        @case('new')
                                            btn-outline-success
                                            @break
                                        @case('complited')
                                            btn-outline-secondary
                                            @break
                                        @default
                                            btn-outline-primary
                                    @endswitch">
                                    {{ $purchase->status }}
                                </button>
                            </form>


                        </td>
                        <td>{{ $purchase->total_price }}</td>

                        <td>
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="backgroud:none; border:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6C757DFF"
                                     class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('purchase.edit', $id = $purchase->id) }}">Изменить</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('purchase.show', $id = $purchase->id) }}">Показать</a>
                                </li>
                                <li>
                                    <form action="{{ route('purchase.destroy', $id = $purchase->id) }}" method="POST"
                                          class="dropdown-item">
                                        @csrf
                                        <button type="submit"
                                                style="border:none; background: none; padding: 0px;">Удалить
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
