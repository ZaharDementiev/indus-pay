@extends('layouts.app')

@section('content')
    <div class="d-print-none with-border users-table">
        <a href="{{route('payment')}}" class="btn @if(Request::is('payment'))btn-primary"
        @else " @endif data-style="zoom-in">
        <span class="ladda-label">
                На рассмотрении
            </span>
        </a>
        <a href="{{route('payment.accepted')}}" class="btn @if(Request::is('payment/accepted'))btn-primary"
        @else " @endif data-style="zoom-in">
        <span class="ladda-label">
                Подтвержденные
            </span>
        </a>
        <a href="{{route('payment.denied')}}" class="btn @if(Request::is('payment/denied'))btn-primary"
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
                Имя
            <th>
                Номер банка
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
        @foreach(auth()->user()->payments()->where('status', $status)->paginate(\App\Payment::REQUESTS_ON_PAGE) as $payment)
            <tr role="row" class="odd">
                <td>
                    <span>
                        {{$payment->name}}
                    </span>
                </td>
                <td>
                    <span>
                        {{$payment->bank_number	}}
                    </span>
                </td>
                <td>
                    <span>
                        {{$payment->sum}}
                    </span>
                </td>
                <td>
                    <a href="{{route('payment.edit.page', $payment->id)}}" class="btn btn-sm btn-link">Сменить статус</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">Имя</th>
            <th rowspan="1" colspan="1">Номер банка</th>
            <th rowspan="1" colspan="1">Сумма</th>
        </tr>
        </tfoot>
    </table>
    {{auth()->user()->requests()->where('status', $status)->paginate(\App\UserRequest::REQUESTS_ON_PAGE)->links()}}
@endsection
