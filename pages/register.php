<?php include "../functions/methods.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <input type="text" name="userName" id="" placeholder="user name"><br>
        <input type="text" name="userSurname" id="" placeholder="user surname"><br>
        <input type="email" name="userEmail" id="" placeholder="email"><br>
        <input type="password" name="userPassword" id="" placeholder="password"><br>
        <input type="submit" value="Zarejestruj" name="submit">
        <input type="reset" value="Wyczyść">
    </form>

    <?php
    $userName = $_POST["userName"];
    $userSurname = $_POST["userSurname"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    if (isset($_POST["submit"])) {
        RegisterUser($userName, $userSurname, $userEmail, $userPassword);
    }
    ?>

</body>
</html>