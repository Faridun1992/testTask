@extends('layouts.app')

@section('content')

    <div class="row py-5">
        <div class="col">
            <h1 class="fs-4">Мои товары</h1>
        </div>
            <div class="col-auto">
                <a class="btn" href="{{route('products.create')}}">
              <span class="d-none d-sm-inline mx-1 navigate">
                Добавить
              </span>
                    <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>

            </div>
    </div>

    @if($products)
        <div class="table-responsive-md">
            <table class="table table-rows">
                <thead>
                <tr>
                    <th class="text-muted">Название</th>
                    <th class="text-muted">Цена</th>
                    <th class="text-muted">Тип</th>
                    <th class="text-muted">Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $product->title }}
                        </td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>
                            {{$product->getType()}}
                        </td>
                        <td>
                            {{$product->created_at->format('d.m.Y H:i')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    @endif
@endsection
