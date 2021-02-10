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
<tr><th>Id</th><th>Project title</th><th>Employees</th><th>Action</th></tr>
</thead>
<tbody>
    @foreach ($projects as $pr)
        <tr> 
            <td>{{ $pr['id'] }}</td>
            <td>{{ $pr['title'] }}</td>
            <td>
        
             {{-- Nepavyko --}}
                {{-- @foreach ($pr->employees as $empl)
                    {{$empl['name']. " " . $empl['surname']. " "}}  
                @endforeach --}}
             </td> 
           <td>
            <div class="btn-group" style="overflow: auto">
                <form style='float: left;' action="{{ route('projects.destroy', $pr['id']) }}" method="POST">
                    @method('DELETE') @csrf
                    <input class="btn btn-outline-danger btn-sm" type="submit" value="DELETE"> 
                </form>
                &nbsp;
                <form style='float: left;' action="{{ route('projects.show', $pr['id']) }}" method="GET">
                    <input class="btn btn-outline-secondary btn-sm" type="submit" value="UPDATE">
                </form>
        </td>
            </tr>
    @endforeach

  </tbody>
    </table>
    
    <form method="POST" action="/Projects">
        @csrf
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="title">Add new project title:</label><br>
        <input type="text" id="title" name="title"><br>
        <br>   
        <input class="btn btn-secondary" type="submit" value="Submit">
    </form>
@endsection
