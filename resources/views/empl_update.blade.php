@extends('layouts.master')
@section('content')
    {{-- Validation error, for invalid incoming data display logic --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {{-- Database error/success display logic --}}
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
        @method('PUT') @csrf
        {{-- @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
        <input type="text" name="name" value="{{ $employee['name'] }}"><br>
        {{-- @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}
    <br>
    <input type="text" name="surname" value="{{ $employee['surname'] }}"><br>
    <br>
    <input type="number" name="proj_id" value="{{ $employee['proj_id'] }}"><br>
    <br>
        <input class="btn btn-secondary" type="submit" value="UPDATE">
    </form>
  @endsection