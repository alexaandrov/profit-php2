<?php if (isset($status) && $status): ?>
    <div class="alert alert-success">Новость успешно создана</div>
<?php endif; ?>
<?php if (isset($status) && ! $status): ?>
    <div class="alert alert-warning">Новость не создана</div>
<?php endif; ?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Creating article</div>
        <div class="panel-body">
            <form action="index.php?controller=News&action=Create" method="POST">
                <p>Author ID:</p>
                <input type="text" name="author_id">
                <br>
                <p>Title:</p>
                <input type="text" name="title">
                <br>
                <p>Text</p>
                <input type="text" name="text"><br><br>
                <input type="submit" value="Create">
            </form>
        </div>
    </div>
</div>