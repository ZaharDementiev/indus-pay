@extends('layouts.app')

@section('content')
    <div class="d-print-none with-border users-table">
        <a href="{{route('add.account')}}" class="btn btn-primary" data-style="zoom-in">
            <span class="ladda-label">
                Добавить аккаунт
            </span>
        </a>
    </div>
    <table id="crudTable"
           class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2 dataTable dtr-inline collapsed has-hidden-columns users-table"
           cellspacing="0" aria-describedby="crudTable_info" role="grid">
        <thead>
            <tr role="row">
                <th>
                    Номер аккаунта
                </th>
                <th>
                    IFSC
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Действия
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->accounts as $account)
                <tr role="row" class="odd">
                    <td>
                        <span>
                            {{$account->account_number}}
                        </span>
                    </td>
                    <td>
                        <span>
                            {{$account->ifsc}}
                        </span>
                    </td>
                    <td>
                        <span>
                            {{$account->name}}
                        </span>
                    </td>
                    <td>
                        <a href="{{route('change.active', $account->id)}}" class="btn btn-sm btn-link @if($account->active) account-active"> Активный&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @else account-non-active">Не активный @endif</a>

                        <a href="{{route('edit.account.page', $account->id)}}" class="btn btn-sm btn-link"></i>Изменить</a>

                        <a class="btn btn-sm btn-link" href="{{route('destroy.account', $account->id)}}"></i>Удалить</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th rowspan="1" colspan="1">Номер аккаунта	</th>
                <th rowspan="1" colspan="1">IFSC</th>
                <th rowspan="1" colspan="1">Имя</th>
                <th rowspan="1" colspan="1">Действия</th>
            </tr>
        </tfoot>
    </table>
@endsection
