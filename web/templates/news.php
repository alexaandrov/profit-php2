<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="/web/assets/main.css">
</head>
<body>
<?php require __DIR__ . '/header.php'?>

<?php foreach ($news as $article): ?>
    <article>
        <h2><a href="?id=<?= $article->getId() ?>"><?= $article->getTitle() ?></a></h2>
        <p><?= $article->getText() ?></p>
    </article>
<?php endforeach ?>
</body>
</html>