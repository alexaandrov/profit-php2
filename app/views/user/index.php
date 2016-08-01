<?php foreach ($users as $user): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="?controller=User&action=View&id=<?= $user->getId() ?>"><?= $user->getName() ?></a></div>
        <div class="panel-body">
            <p>Id: <?= $user->getId() ?></p>
            <p>First name: <?= $user->getFirstName() ?></p>
            <p>Last name: <?= $user->getLastName() ?></p>
            <p>Email: <?= $user->getEmail() ?></p>
        </div>
    </div>
<?php endforeach; ?>