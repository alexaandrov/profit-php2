<?php if (isset($status) && $status): ?>
    <div class="alert alert-success">Новость № <?= $_GET['id'] ?> успешно обновлена</div>
<?php endif; ?>
<?php if (isset($status) && ! $status): ?>
    <div class="alert alert-warning">Новость № <?= $_GET['id'] ?> не обновлена</div>
<?php endif; ?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Article: <?= $article->getId() ?></div>
        <div class="panel-body">
            <form action="index.php?controller=News&action=Update&id=<?= $article->getId() ?>" method="POST">
                <p>Title:</p>
                <article><?= $article->getTitle(); ?></article>
                <input type="text" name="title">
                <br>
                <p>Text</p>
                <article><?= $article->getText(); ?></article>
                <input type="text" name="text"><br><br>
                <input type="submit" value="Edit">
            </form>
        </div>
    </div>
</div>