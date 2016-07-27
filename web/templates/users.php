<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="/web/assets/main.css">
</head>
<body>
<?php require __DIR__ . '/header.php'?>

<?php foreach ($users as $user): ?>
    <article>
        <h2><a href="?id=<?= $user->getId() ?>"><?= $user->getName() ?></a></h2>
        <p><?= $user->getEmail() ?></p>
    </article>
<?php endforeach ?>
</body>
</html>