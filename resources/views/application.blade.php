@extends('layouts.app')

@section('content')

    <div class="row py-5">
        <div class="col">
            <h1 class="fs-4">{{auth()->user()->is_buyer ? 'Мои запросы' : 'Запросы'}}</h1>
        </div>
        @if(auth()->user()->is_buyer)
            <div class="col-auto">
                <a class="btn" href="{{route('applications.create')}}">
              <span class="d-none d-sm-inline mx-1 navigate">
                Создать запрос
              </span>
                    <svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>

            </div>
        @endif

    </div>

    @if($applications)
        <div class="table-responsive-md">
            <table class="table table-rows">
                <thead>
                <tr>
                    <th class="text-muted">Название</th>
                    <th class="text-muted">От</th>
                    <th class="text-muted">До</th>
                    <th class="text-muted">Тип</th>
                    <th class="text-muted">Продавец</th>
                    <th class="text-muted">Почта</th>
                    <th class="text-muted">Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>
                            {{ $application->title }}
                        </td>
                        <td>
                            {{ $application->price_from }}
                        </td>
                        <td>
                            {{ $application->price_to }}
                        </td>

                        <td>
                            {{$application->getType()}}
                        </td>
                        <td>
                            {{$application->user->name}}
                        </td>
                        <td>
                            {{ $application->user->email }}
                        </td>
                        <td>
                            {{$application->created_at->format('d.m.Y H:i')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
