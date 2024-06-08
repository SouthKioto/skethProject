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
    <form action="searchCompPage.php" method="post">
        <input type="text" name="compName" id="" >
        <input type="submit" value="Szukaj" name="submit">
    </form>

    <ul>
    <?php
    $compName = $_POST["compName"];

    $compData = SearchCompany($compName);

    //print_r($compData);

    foreach ($compData as $company) {
        echo "<li><a href='http://localhost/skethProject/pages/compPage.php?company_id=" .
            $company["company_id"] .
            "&" .
            "company_name=" .
            $company["company_name"] .
            "'>" .
            $company["company_name"] .
            "</a></li>";
    }
    ?>

    </ul>




</body>
</html>