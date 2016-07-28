<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/web/assets/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php require __DIR__ . '/../../web/templates/header.php' ?>

<?php foreach ($news as $article): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2><a href="?id=<?= $article->getId() ?>"><?= $article->getTitle() ?></a></h2>
        </div>
        <div class="panel-body">
            <p><?= $article->getText() ?></p>
            <p class="author">
                <?php $author = $article->author ?>
                <?php if (!empty($author)): ?>
                    <strong><?= $author->getName(); ?></strong>
                    <a href="mailto:<?= $author->getEmail() ?>"><?= $author->getEmail(); ?></a>
                <?php else: ?>
                    <strong>Unkown</strong>
                <?php endif ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>