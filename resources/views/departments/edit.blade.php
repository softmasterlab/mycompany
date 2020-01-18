@extends('layouts.app')

@section('title')
    Edit Department
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Редактирование департамента - {{ $dep->dep_name }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Исходные данные</h5>  
                    <form class="form1" method="post" action="{{ url('departments/'.$dep->id) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <p>
                            <label for="dep_name">Название департамента:</label>
                            <input type="text" id="dep_name" name="dep_name" class="form-control" required value="{{ $dep->dep_name }}">
                        </p>
                        <p>
                            <input type="submit" value="Сохранить" class="submit">
                        </p>
                    </form>
                    <form class="form1" method="post" action="{{ url('departments/'.$dep->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <p>
                            <input type="submit" value="Удалить" class="submit">
                        </p>
                    </form>
                    <a href="{{ url('departments') }}">Назад к списку департаментов</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
