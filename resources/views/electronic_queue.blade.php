@extends('layout', ['title' => ' - задачи'])


@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center"><a href="/">Электронная очередь</a></h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row"> {{$task->id}} </th>
                    <td><a href="/queue/addTask{{$task->id}}"> {{$task->name}} </a></td>
                    <td>{{$task->counter}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-6"><a href="/queue">Посмотреть очередь</a></div>
        <div class="col-6"><a href="/queue/gowork">Принять в работу</a></div>
    </div>

    @if (isset($worktask_id))
        <div class="row">
            <p class="text-center">Номер принятой задачи: {{$worktask_id}}</p>
        </div>
    @endif
</div>
@endsection
