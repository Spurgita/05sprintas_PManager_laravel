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

    <form action="{{ route('projects.update', $project['id']) }}" method="POST">
        @method('PUT') @csrf
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="title" value="{{ $project['title'] }}"><br>
        <input class="btn btn-secondary" type="submit" value="UPDATE">
    </form>
  @endsection