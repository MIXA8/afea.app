<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{ route('teacher.store') }}" method="post">
    @csrf
    <input type="text" name="name" value="Жавоншер">
    <input type="text" name="surname" value="Рахимов">
    <input type="text" name="patronymic" value="Баходурович">
    <input type="text" name="department" value="1">
    <input type="submit" >
</form>

</body>
</html>
