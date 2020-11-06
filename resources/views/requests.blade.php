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
                Номер транзакции
            </th>
            <th>
                Пользователь на FriendsOnly
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
        @foreach(auth()->user()->requests()->where('status', $status)->get() as $request)
            <tr role="row" class="odd">
                <td>
                    <span>
                        {{$request->code}}
                    </span>
                </td>
                <td>
                    <span>
                        {{$request->friendsonly_user_id	}}
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
            <th rowspan="1" colspan="1">Номер транзакции</th>
            <th rowspan="1" colspan="1">Пользователь на FriendsOnly</th>
        </tr>
        </tfoot>
    </table>
@endsection
