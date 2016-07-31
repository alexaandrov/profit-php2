<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= $css ?>
</head>
<body>
<?php require __DIR__ . '/../../../web/templates/header.php' ?>

<?php foreach ($news as $article): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2><a href="?action=View&id=<?= $article->getId() ?>"><?= $article->getTitle() ?></a></h2>
        </div>
        <div class="panel-body">
            <p><?= $article->getText() ?></p>
            <p class="author">
                <?php $author = $article->author ?>
                <?php if (! empty($author)): ?>
                    <strong><?= $author->getName(); ?></strong>
                    <a href="mailto:<?= $author->getEmail() ?>"><?= $author->getEmail(); ?></a>
                <?php else: ?>
                    <strong>Unkown</strong>
                <?php endif ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>

<?= $js ?>
</body>
</html>