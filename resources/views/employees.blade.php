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

<table class="table table-bordered">
<thead class="thead-dark">
<tr><th>Id</th><th>Name</th><th>Surame</th><th>Project</th><th>Action</th></tr>
</thead>
<tbody>
    @foreach ($employees as $empl)
        <tr> 
            <td>{{ $empl['id'] }}</td>
           <td>{{ $empl['name'] }}</td>
           <td>{{ $empl['surname'] }}</td>
           <td>{{ (\App\Models\Projects::find($empl['proj_id']))->title }}</td>
           <td>
            <div class="btn-group" style="overflow: auto">
                <form style='float: left;' action="{{ route('employees.destroy', $empl['id']) }}" method="POST">
                    @method('DELETE') @csrf
                    <input class="btn btn-outline-danger btn-sm" type="submit" value="DELETE"> 
                </form>
                &nbsp;
                <form style='float: left;' action="{{ route('employees.show', $empl['id']) }}" method="GET">
                    <input class="btn btn-outline-secondary btn-sm" type="submit" value="UPDATE">
                </form>
        </td>
            </tr>
    @endforeach

  </tbody>
    </table>
   
    
    <form method="POST" action="/Employees">
        @csrf
        {{-- @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
        <label for="name">Add new name:</label><br>
        <input type="text" id="name" name="name"><br>
        {{-- @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}
    <label for="name">Add new surname:</label><br>
    <input type="text" id="surname" name="surname"><br>
    <label for="name">Add project id:</label><br>
    <input type="number" id="proj_id" name="proj_id"><br>
    
    {{-- <select class="custom-select mr-sm-2" name="proj_id">
        <option>Select Project</option>    
        @foreach ($projects as $pr)
          <option value="{{ $pr->id }}" {{ ( $pr->id == $existingRecordId) ? 'selected' : '' }}> {{ $pr->title }} </option>
        @endforeach    </select> --}}

    <br>
        <input class="btn btn-secondary" type="submit" value="Submit">
    </form>
@endsection
