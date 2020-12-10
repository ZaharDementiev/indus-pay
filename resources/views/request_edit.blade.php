@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('requests.edit.submit', $id)}}" class="users-table">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="form-group col-sm-12 required" element="div">
                    <label>Сумма</label>
                    <label class="form-control">{{\App\UserRequest::where('id', $id)->first()->sum}}</label>
                </div>
                <div class="form-group col-sm-12 required" element="div">
                    <label>Код банка</label>
                    <label class="form-control">{{\App\UserRequest::where('id', $id)->first()->bank_code}}</label>
                </div>
                <div class="form-group col-sm-12 required" element="div">
                    <label>IFSC</label>
                    <label class="form-control">{{\App\UserRequest::where('id', $id)->first()->ifsc}}</label>
                </div>
                <div class="form-group col-sm-12 required" element="div">
                    <label>Привязанный аккаунт</label>
                    <label class="form-control">{{\App\UserRequest::where('id', $id)->first()->getAccount()->account_number}}</label>
                </div>
                <div class="form-group col-sm-12" element="div">
                    <label>Статус</label>
                    <select name="status" class="custom-select">
                        <option @if(\App\UserRequest::where('id', $id)->first()->status == \App\UserRequest::WAITING) selected="selected"
                                @endif value="{{\App\UserRequest::WAITING}}">На рассмотрении</option>
                        <option @if(\App\UserRequest::where('id', $id)->first()->status == \App\UserRequest::ACCEPTED) selected="selected"
                                @endif value="{{\App\UserRequest::ACCEPTED}}">Подтверждено</option>
                        <option @if(\App\UserRequest::where('id', $id)->first()->status == \App\UserRequest::DENIED) selected="selected"
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
            <a href="{{route('requests')}}" class="btn btn-default"><span class="la la-ban"></span>Назад</a>
        </div>
    </form>
@endsection
