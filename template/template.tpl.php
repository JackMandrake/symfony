<html>
<head>
    <title><?php echo $data['title']; ?></title>
</head>
    <body>
    <?php echo $data['content']; ?>
    </body>
</html>
// hello.php
Hello, <?= $view->escape($firstname) ?>!
