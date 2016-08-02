<?php if (isset($status) && $status): ?>
    <div class="alert alert-success">Пользователь успешно создан</div>
<?php endif; ?>
<?php if (isset($status) && ! $status): ?>
    <div class="alert alert-warning">Пользователь не создан</div>
<?php endif; ?>

<?php if (isset($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger">
        <?= $error->getMessage() ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Creating article</div>
        <div class="panel-body">
            <form action="index.php?controller=User&action=Create" method="POST">
                <p>First Name:</p>
                <input type="text" name="firstName">
                <br>
                <p>Last Name:</p>
                <input type="text" name="lastName">
                <br>
                <p>Email:</p>
                <input type="text" name="email"><br><br>
                <input type="submit" value="Create">
            </form>
        </div>
    </div>
</div>