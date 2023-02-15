<?php

session_unset();
setcookie(session_name(), '', 0, '/');

?>

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
    <h3>Your session information has been deleted</h3>
    <button><a href="http://localhost:8080">Go back</a></button>
</body>
</html>
