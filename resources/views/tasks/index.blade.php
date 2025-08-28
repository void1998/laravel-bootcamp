@extends('layout.base')
@section("main_content")
<div class="main cards-section">
    @if(session("success"))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
    @endif
    @foreach($tasks->chunk(3) as $chunk)
        <div class="row mt-2">
            @foreach($chunk as $task)
                <div class="card col-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$task->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$task->created_at}}</h6>
                    <p class="card-text">{{$task->description}}</p>
                    <form method="POST" action="task/{{$task->id}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                </div>
            @endforeach

        </div>

    @endforeach
</div>
@endsection