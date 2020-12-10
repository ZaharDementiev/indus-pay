@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('add.account.post')}}" class="users-table">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="form-group col-sm-12 required" element="div">
                    <label>Номер аккаунта</label>
                    <input type="number" name="number" value="" class="form-control">
                </div>
                <div class="form-group col-sm-12" element="div">
                    <label>IFSC</label>
                    <input type="text" name="ifsc" value="" class="form-control">
                </div>
                <div class="form-group col-sm-12" element="div">
                    <label>Имя</label>
                    <input type="text" name="name" value="" class="form-control">
                </div>
            </div>
        </div>
        <div id="saveActions" class="form-group">
            <div role="group">
                <button type="submit" class="btn btn-success">
                    Добавить
                </button>
            </div>
            <a href="{{route('accounts')}}" class="btn btn-default"><span class="la la-ban"></span>Назад</a>
        </div>
    </form>
@endsection
