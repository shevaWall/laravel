<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form page</title>
</head>
<body>

    @if ($method == "GET")
        <form action="/form" method="POST">
            @csrf
            <label for="uName">Имя: </label>
            <input type="text" name="uName"/>
            <button type="submit">Отправить</button>
        </form>
    @else
        <p>форма принята</p>
    @endif
</body>
</html>
