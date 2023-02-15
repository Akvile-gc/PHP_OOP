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
    <h3>Visit counter:</h3>

    <div>
        <?php session_start();?>
        <?php if (!isset($_SESSION['visit_counter'])): ?>
            <?php $_SESSION['visit_counter'] = 0; ?>
        <?php else: ?>
            <?php $_SESSION['visit_counter']++; ?>
        <?php endif; ?>
    </div>

    <p style="font-weight: bold"><?php echo $_SESSION['visit_counter']?></p>

    <br>

    <h3>Visit history:</h3>

    <div>
        <?php if (!isset($_SESSION['visit_history'])): ?>
            <?php $_SESSION['visit_history'] = []; ?>
        <?php endif; ?>
        <?php $_SESSION['visit_history'][] = $_SERVER['REQUEST_URI'];?>
        <?php foreach ($_SESSION['visit_history'] as $url): ?>
            <p style="font-weight: bold"><?php echo $url . PHP_EOL;?></p>
        <?php endforeach; ?>
    </div>

</body>
</html>


<!--session_start();-->
<!---->
<!--//visit counter-->
<!--if (!isset($_SESSION['visit_counter'])) {-->
<!--    $_SESSION['visit_counter'] = 0;-->
<!--} else {-->
<!--    $_SESSION['visit_counter']++;-->
<!--}-->
<!--echo 'Visit counter: ' . $_SESSION['visit_counter']. PHP_EOL;-->
<!---->
<!---->
<!--//visit history-->
<!--if (!isset($_SESSION['visit_history'])) {-->
<!--    $_SESSION['visit_history'] = [];-->
<!--}-->
<!---->
<!--$_SESSION['visit_history'][] = $_SERVER['REQUEST_URI'];-->
<!---->
<!--echo 'Visit history: ' . PHP_EOL;-->
<!---->
<!--foreach ($_SESSION['visit_history'] as $url){-->
<!--    echo $url . PHP_EOL;-->
<!--}-->