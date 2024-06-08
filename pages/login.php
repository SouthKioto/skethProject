<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../functions/methods.php"; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="email" name="userEmail" id="">
        <input type="password" name="userPassword" id="">
        <input type="submit" value="Zalogoj" name="submit">
        <input type="reset" value="wyczysc">
        <input type="submit" value="wroc" name="back">
    </form>

    <?php if (isset($_POST["submit"])) {
        $email = $_POST["userEmail"];
        $pass = $_POST["userPassword"];
        Login($email, $pass);
    } ?>


</body>
</html>