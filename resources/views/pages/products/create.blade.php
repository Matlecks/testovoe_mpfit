@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">
            <form action="{{ route('product.store') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                           value="" name="name">
                </div>

                <div class="form-floating mb-3">
                    <textarea name="description" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px">
                    </textarea>
                    <label for="floatingTextarea2">Описание</label>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                           value="" name="price">
                </div>

                <div class="form-floating w-25">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Категория</label>
                </div>

                <button type="submit" class="btn btn-outline-success mt-5">Сохранить</button>
            </form>
        </div>
    </section>
@endsection
