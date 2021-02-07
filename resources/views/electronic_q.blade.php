<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--    bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Очередь</title>
</head>
<body>
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
                <td> {{$log->name}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
