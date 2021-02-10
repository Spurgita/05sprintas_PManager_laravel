@extends('layouts.master')
@section('content')
<br>
<table class="table table-bordered">
    <thead class="thead-dark">
    <tr><th>Employees</th><th>Projects</th></tr>
    </thead>
    <tbody>
    <tr>
        {{-- <td>Darbuotoju skaicius</td> --}}
        <td>{{\App\Models\Employees::count()}}</td>
        {{-- <td>Projektu skaicius</td> --}}
        <td>{{\App\Models\Projects::count()}}</td>
    </tr>
    </tbody>
    </table>

@endsection
