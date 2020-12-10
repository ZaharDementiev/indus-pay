@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('payment.edit.submit', $id)}}" class="users-table">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="form-group col-sm-12 required" element="div">
                    <label>Имя владельца</label>
                    <label class="form-control">{{\App\Payment::where('id', $id)->first()->name}}</label>
                </div>
                <div class="form-group col-sm-12 required" element="div">
                    <label>Номер банка</label>
                    <label class="form-control">{{\App\Payment::where('id', $id)->first()->bank_number}}</label>
                </div>
                <div class="form-group col-sm-12 required" element="div">
                    <label>Сумма</label>
                    <label class="form-control">{{\App\Payment::where('id', $id)->first()->sum}}</label>
                </div>
                <div class="form-group col-sm-12" element="div">
                    <label>Статус</label>
                    <select name="status" class="custom-select">
                        <option @if(\App\Payment::where('id', $id)->first()->status == \App\Payment::WAITING) selected="selected"
                                @endif value="{{\App\Payment::WAITING}}">На рассмотрении</option>
                        <option @if(\App\Payment::where('id', $id)->first()->status == \App\Payment::ACCEPTED) selected="selected"
                                @endif value="{{\App\Payment::ACCEPTED}}">Подтверждено</option>
                        <option @if(\App\Payment::where('id', $id)->first()->status == \App\Payment::DENIED) selected="selected"
                                @endif value="{{\App\UserRequest::DENIED}}">Отклонено</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="saveActions" class="form-group">
            <div role="group">
                <button type="submit" class="btn btn-success">
                    Сохранить
                </button>
            </div>
            <a href="{{route('payment')}}" class="btn btn-default"><span class="la la-ban"></span>Назад</a>
        </div>
    </form>
@endsection
