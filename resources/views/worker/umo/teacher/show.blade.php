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
<input type="text" name="name" value="{{ $teacher->name }}">
<input type="text" name="surname" value="{{ $teacher->surname }}">
<input type="text" name="patronymic" value="{{ $teacher->patronymic }}">
<input type="text" name="department" value="{{ $teacher->department }}">
<input type="text" name="login" value="{{ $teacher->login }}">

</body>
</html>
