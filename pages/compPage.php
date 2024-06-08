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
    
    <h1>dane firmy <?php echo $_GET["company_name"]; ?></h1>

    <ul>
        
        <?php
        $compData = SearchCompany(null, $_GET["company_id"]);
        foreach ($compData as $company) {
            foreach ($company as $key => $data) {
                if ($key == "company_logo") {
                    echo '<li><img width="150" src="data:image/jpeg;base64,' .
                        $data .
                        '"></li>';
                } else {
                    echo "<li>" . $data . "</li>";
                }
            }
        }
        ?>
            
    </ul>
</body>
</html>