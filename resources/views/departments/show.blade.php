@extends('layouts.app')

@section('title')
    {{ $dep->dep_name }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $dep->dep_name }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Список должностей</h5>
                    <table id="table1" border="1">
                        <tr>
                            <th>Pos_Id</th>
                            <th>Pos_Name</th>
                            <th>Pos_Management</th>
                        </tr>
                        @foreach ($poss as $pos)
                            <tr>
                                <td class="cen">{{ $pos->id }}</td>
                                <td>{{ $pos->pos_name }}</td>
                                <td class="cen">
                                    |
                                    <a href="">Details</a>
                                    |
                                    @if ($user == 'admin1')
                                    <a href="">Edit</a>
                                    |
                                    <a href="">Delete</a>
                                    |
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <br>

                    <h5>Список сотрудников</h5>
                    <table id="table2" border="1">
                        <tr>
                            <th>Emp_Id</th>
                            <th>Emp_Name</th>
                            <th>Birth_Day</th>
                            <th>Gender</th>
                            <th>Pos_Name</th>
                            <th>Salary</th>
                            <th>Emp_Management</th>
                        </tr>
                        @foreach ($emps as $emp)
                            <tr>
                                <td class="cen">{{ $emp['person']->id }}</td>
                                <td>{{ $emp['person']->emp_name }}</td>
                                <td class="cen">{{ $emp['person']->birth_day }}</td>
                                <td class="cen">{{ $emp['person']->gender }}</td>
                                <td class="cen">{{ $emp['pos_name'] }}</td>
                                <td class="cen">{{ $emp['person']->salary }}</td>
                                <td class="cen">
                                    |
                                    <a href="">Details</a>
                                    |
                                    @if ($user == 'admin1')
                                    <a href="">Edit</a>
                                    |
                                    <a href="">Delete</a>
                                    |
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <a href="{{ url('departments') }}">Назад к списку департаментов</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
