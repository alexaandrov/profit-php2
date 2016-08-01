<?php foreach ($news as $article): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="?action=View&id=<?= $article->getId() ?>"><?= $article->getTitle() ?></a>
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