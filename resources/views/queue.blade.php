@extends('layout', ['title' => ' - очередь'])

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center"><a href="/">Электронная очередь</a></h1>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Поступление задачи</th>
            <th scope="col">Название задачи</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <th scope="row"> {{$log->id}} </th>
                <td> {{$log->created_at}} </td>
                <td> {{$log->taskName->name}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
