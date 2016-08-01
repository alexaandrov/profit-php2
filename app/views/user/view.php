<div class="panel panel-default">
    <div class="panel-heading">
        <?= $user->getName() ?>
    </div>
    <div class="panel-body">
        <p>Id: <?= $user->getId() ?></p>
        <p>First name: <?= $user->getFirstName() ?></p>
        <p>Last name: <?= $user->getLastName() ?></p>
        <p>Email: <?= $user->getEmail() ?></p>
    </div>
</div>