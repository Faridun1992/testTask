@extends('layouts.app')

@section('content')
    <div class="row py-5">
        <div class="col">
            <h1 class="fs-4">Заявки</h1>
        </div>
        <div class="col-auto">
            <a class="btn" href="{{route('applications')}}">
            <span class="d-none d-sm-inline mx-1 navigate">
              Назад
            </span>
                <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>

    <form action="{{route('applications.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <h5>Данные заявки</h5>
            </div>
            <div class="col-md">
                <div class="row g-2">
                    <div class="col-md-6 mb-4">
                        <div class="form-floating ">
                            <input type="text" name="title" value="{{old('title')}}" class="{{$errors->has('surname') ? 'form-control is-invalid' : 'form-control'}}">
                            <label>Название</label>
                            @if ($errors->has('surname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surname') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-floating ">
                            <select name="type" class="{{$errors->has('type') ? 'form-select is-invalid' : 'form-select'}}">
                                <option value="{{\App\Models\Type::NEW}}">Новый</option>
                                <option value="{{\App\Models\Type::USED}}">БУ</option>
                            </select>
                            <label>Тип</label>
                            @if ($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-floating ">
                            <input type="number" name="price_from" value="{{old('price_from')}}" min="0" class="{{$errors->has('price_from') ? 'form-control is-invalid' : 'form-control'}}">
                            <label>Цена От</label>
                            @if ($errors->has('price_from'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price_from') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-floating ">
                            <input type="number" name="price_to" value="{{old('price_to')}}"  class="{{$errors->has('price_to') ? 'form-control is-invalid' : 'form-control'}}">
                            <label>Цена До</label>
                            @if ($errors->has('price_to'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price_to') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
            </div>
            <div class="col-auto">
                <div class="text-md-end">
                    <button class="btn btn-success" type="submit" name="button">Сохранить</button>
                </div>
            </div>
        </div>
    </form>

@endsection
