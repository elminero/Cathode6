@extends('layouts.master')

@section('title', 'List of Projects')

@section('content')

    <div class="jumbotron text-center">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                <h3>Project: {{$project->title}}</h3>

                <p>{{$project->description}}</p>

            </div>

            <div class="col-sm-4">
                <h3>Add a Task</h3>
                <form method="post" action="/projects/{{$project->id}}/Tasks">

                    @csrf

                    <div class="form-group">
                        <label for="title">Task</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add a Task</button>
                    </div>

                </form>
            </div>
            <div class="col-sm-4">
                <h3>Tasks</h3>

                    @foreach($project->tasks as $task)
                        <form method="post" action="/tasks/{{$task->id}}">
                            @csrf
                            @method('patch')
                            <label for="completed" class="
                                {{$task->completed?'completed':'uncompleted'}}
                            ">
                                <input type="checkbox" name="completed" onchange="form.submit()"
                                    {{$task->completed?'checked':''}}
                                >
                                {{$task->title}}
                            </label>
                        </form>
                    @endforeach

            </div>
        </div>
    </div>

@endsection

