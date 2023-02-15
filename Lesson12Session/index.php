<?php
session_start();

if (!isset($_SESSION['visit_counter'])){
    $_SESSION['visit_counter'] = 0;
} else {
    $_SESSION['visit_counter']++;
}

if (!isset($_SESSION['visit_history'])){
    $_SESSION['visit_history'] = [];
} else {
    $_SESSION['visit_history'][] = $_SERVER['REQUEST_URI'];
}

function history(array $visitHistory):void {
    foreach ($visitHistory as $url){
        echo $url . PHP_EOL;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <h3>Visit counter: <?php echo $_SESSION['visit_counter']?></h3>

    <h3>Visit history: </h3>
    <h3><?php history($_SESSION['visit_history']); ?></h3>

    <form method="POST" action="src/DeletingSessionInfo.php">
        <input type="submit" value="Delete Session Information">
    </form>

    </body>
</html>