@extends('layouts.app')

@section('title')
    Create Department
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Добавление департамента</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Исходные данные</h5>                    
                    <form class="form1" method="post" action="{{ url('departments') }}">
                        {{ csrf_field() }}
                        <p>
                            <label for="dep_name">Название департамента:</label>
                            <input type="text" id="dep_name" name="dep_name" class="form-control" required>
                        </p>
                        <p>
                            <input type="submit" value="Добавить">
                        </p>
                    </form>
                    <a href="{{ url('departments') }}">Назад к списку департаментов</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
