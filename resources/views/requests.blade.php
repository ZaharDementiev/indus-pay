@extends('layouts.app')

@section('content')
    <div class="d-print-none with-border users-table">
        <a href="{{route('requests')}}" class="btn @if(Request::is('requests'))btn-primary"
            @else " @endif data-style="zoom-in">
            <span class="ladda-label">
                На рассмотрении
            </span>
        </a>
        <a href="{{route('requests.accepted')}}" class="btn @if(Request::is('requests/accepted'))btn-primary"
            @else " @endif data-style="zoom-in">
            <span class="ladda-label">
                Подтвержденные
            </span>
        </a>
        <a href="{{route('requests.denied')}}" class="btn @if(Request::is('requests/denied'))btn-primary"
            @else " @endif data-style="zoom-in">
            <span class="ladda-label">
                Отклоненные
            </span>
        </a>
    </div>
    <table id="crudTable"
           class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2 dataTable dtr-inline collapsed has-hidden-columns users-table"
           cellspacing="0" aria-describedby="crudTable_info" role="grid">
        <thead>
        <tr role="row">
            <th>
                Код банка
            </th>
            <th>
                IFSC
            </th>
            <th>
                Привязанный аккаунт
            </th>
            <th>
                Сумма
            </th>
            <th>
                Действия
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach(auth()->user()->requests()->where('status', $status)->paginate(\App\UserRequest::REQUESTS_ON_PAGE) as $request)
            <tr role="row" class="odd">
                <td>
                    <span>
                        {{$request->bank_code}}
                    </span>
                </td>
                <td>
                    <span>
                        {{$request->ifsc}}
                    </span>
                </td>
                <td>
                    <span>

                        {{$request->getAccount()->account_number}}
                    </span>
                </td>
                <td>
                    <span>
                        {{$request->sum	}}
                    </span>
                </td>
                <td>
                    <a href="{{route('requests.edit.page', $request->id)}}" class="btn btn-sm btn-link">Сменить статус</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">Код банка</th>
            <th rowspan="1" colspan="1">IFSC</th>
            <th rowspan="1" colspan="1">Привязанный аккаунт</th>
            <th rowspan="1" colspan="1">Сумма</th>
            <th rowspan="1" colspan="1">Действия</th>
        </tr>
        </tfoot>
    </table>
    {{auth()->user()->requests()->where('status', $status)->paginate(\App\UserRequest::REQUESTS_ON_PAGE)->links()}}
@endsection
