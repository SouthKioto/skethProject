<?php
include "../functions/methods.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>siema to strona z jakimiś ofertami</h1>
        <p>pod strone jest podłączona ta baza danych: <a href="../database/bazadanychpraca.sql">bazadanychpraca.sql</a></p>
    </header>

    <section>
        <form method="post" action="index.php">
            <?php if ($_SESSION["login"] == "true") { ?>
                <p>
                    <h2>jestes zalogowany jako: <?php echo SelectDataFormSession(
                        $_SESSION["userData"],
                        "name"
                    ); ?> </h2>
                    <input type="submit" value="twoje konto" name="userAcc">
                </p>
                <p>
                    <input type="submit" value="wologoj" name="logout">
                </p>
            <?php } else { ?>
                <p><input type="submit" value="logowanie" name="login"></p>
            <?php } ?>
            

            <input type="submit" value="wyszukiwarka ofert" name="search_not">
            <input type="submit" value="wyszukiwarka pracodawcow" name="search_comp">

            <?php if (isset($_POST["logout"])) {
                Logout();
                //echo "sima";
            } elseif (isset($_POST["login"])) {
                header("Location: login.php");
            } elseif (isset($_POST["userAcc"])) {
                header("Location: userpage.php");
            } elseif (isset($_POST["search_comp"])) {
                header("Location: searchCompPage.php");
            } ?>
        </form>


    </section>
</body>
</html>