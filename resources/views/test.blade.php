@extends('layouts.app')

@section('content')

    <form method="POST" action="{{route('payed')}}" class="users-table">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="form-group col-sm-12 required" element="div">
                    <label>TEST</label>
                    <input type="text" name="account_id" value="3" class="form-control">
                    <input type="text" name="request_id" value="6" class="form-control">
                </div>
            </div>
        </div>
        <div id="saveActions" class="form-group">
            <div role="group">
                <button type="submit" class="btn btn-success">
                    Добавить
                </button>
            </div>
        </div>
    </form>

@endsection
