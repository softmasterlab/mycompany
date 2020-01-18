@extends('layouts.app')

@section('title')
    Departments
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Управление департаментами</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Список департаментов</h5>                    
                    <table id="table1" border="1">
                        <tr>
                            <th>Dep_Id</th>
                            <th>Dep_Name</th>
                            <th>Dep_Management</th>
                        </tr>
                        @foreach ($deps as $dep)
                            <tr>
                                <td class="cen">{{ $dep->id }}</td>
                                <td>{{ $dep->dep_name }}</td>
                                <td class="cen">
                                    |
                                    <a href="{{ url('departments/'.$dep->id) }}">Details</a>
                                    |
                                    @if ($user == 'admin1')
                                    <a href="{{ url('departments/'.$dep->id.'/edit') }}">Edit</a>
                                    |
                                    <a href="{{ url('departments/'.$dep->id.'/edit') }}">Delete</a>
                                    |
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @if ($user == 'admin1')
                        <br>
                        <a href="{{ url('departments/create') }}">Добавить департамент</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
