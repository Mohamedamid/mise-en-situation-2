<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/Authlogin" method="post">
        @csrf
        <input type="email" name="email" >
        <input type="passwprd" name="password">
        <button type="submit">submit</button>
    </form>
    <a href="/register">register</a>
</body>
</html>