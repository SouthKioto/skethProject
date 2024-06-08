<?php include "../functions/methods.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
        $namesArr = [
            //"user_id",
            "name",
            "surname",
            "birth_date",
            "email",
            "tel_number",
            "prof_image",
            "curr_position",
            "curr_position_description",
            "career_summary",
        ];
        foreach ($namesArr as $data) {
            if ($data == "prof_image") {
                echo '<li><img width="150" src="data:image/jpeg;base64,' .
                    SelectDataFormSession($_SESSION["userData"], $data) .
                    '"></li>';
            } else {
                echo "<li>" .
                    SelectDataFormSession($_SESSION["userData"], $data) .
                    "</li>";
            }
        }
        ?>
    </ul>
</body>
</html>
