<div class="add">
    <a href="?controller=News&action=Delete"><li class="fa fa-plus-circle"></li></a>
</div>
<?php if (isset($status) && $status): ?>
<div class="alert alert-success">Новость № <?= $_GET['id'] ?> удалена</div>
<?php endif; ?>
<?php foreach ($news as $article): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="col-md-6">
                <div class="text-left">
                    <a href="?controller=News&action=View&id=<?= $article->getId() ?>"><?= $article->getTitle() ?> <?= $article->getId() ?></a>
                </div>
            </div>
            <div class="text-right">
                <a href="?controller=News&action=Update&id=<?= $article->getId() ?>"><li class="fa fa-edit"></li></a>
                <a href="?controller=News&action=Delete&id=<?= $article->getId() ?>"><li class="fa fa-trash"></li></a>
            </div>
        </div>
        <div class="panel-body">
            <p><?= $article->getText() ?></p>
            <p class="author">
                <?php $author = $article->author ?>
                <?php if (! empty($author)): ?>
                    <strong><?= $author->getName(); ?></strong>
                    <a href="mailto:<?= $author->getEmail() ?>"><?= $author->getEmail(); ?></a>
                <?php else: ?>
                    <strong>Unknown</strong>
                <?php endif ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>