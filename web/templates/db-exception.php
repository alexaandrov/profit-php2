<h1>Database <b>query</b> error</h1>
<div class="panel panel-default">
    <div class="panel-heading"><div class="alert alert-danger"><?= $e->getMessage(); ?></div></div>
    <div class="panel-body"><div class="alert alert-info"><?= $e->getTraceAsString(); ?></div></div>
    <div class="panel-footer">
        <div class="alert alert-link">
            <p><?= 'File: ' . $e->getFile(); ?></p>
            <p><?= 'Line: ' . $e->getLine(); ?></p>
            <p><?= 'Code: ' . $e->getCode(); ?></p>
        </div>
    </div>
</div>