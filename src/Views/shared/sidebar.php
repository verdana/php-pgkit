<!-- sidebar -->
<div id="sidebar" class="tm-sidebar-left uk-background-default" aria-hidden="false">
    <ul class="uk-nav uk-nav-default">
        <?php foreach($databases as $db): ?>
        <li class="uk-nav-header">
            <a href="/db/<?= $db['datname'] ?>"><?= $db['datname'] ?></a>
        </li>
        <?php if ($dbname == $db['datname']): ?>
        <ul>
            <?php foreach ($tables as $tbl): ?>
            <li><a href="/db/<?= $db['datname'] ?>?tbl=<?= $tbl['tablename'] ?>"><?= $tbl['tablename'] ?></a></li>
            <?php endforeach ?>
        </ul>
        <?php endif ?>
        <?php endforeach ?>
    </ul>
</div> <!-- sidebar -->
