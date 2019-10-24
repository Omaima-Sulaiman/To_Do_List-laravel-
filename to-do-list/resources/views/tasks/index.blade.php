@extends('layouts.app')
@section('content')

    <table class="table">
        @foreach($tasks as $task)
            <tr>
                <td>
                    {{$task->task}}
                </td>
                <td>
                    <a href="/tasks/{{$task->id}}/edit" class="btn btn-primary">edit</a>
                    </td>
                <td>
                    <form method="POST" action="/tasks/{{$task->id}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
    </table>
    @endsection
