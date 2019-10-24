@extends('layouts.app')

@section('content')

<form  method="POST" action="{{route('tasks.store')}}" >
    <div class="form-group" >
        @csrf
        <label for="exampleInputEmail1">Add Task</label>
        <input  name ="task" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="writr your task">

    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
