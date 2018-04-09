<!-- sidebar -->
<div id="sidebar" class="tm-sidebar-left uk-background-default">
    <ul class="uk-nav uk-nav-default">
        <?php foreach($databases as $db): ?>
        <li class="uk-nav-header">
            <a href="/db/<?= $db['datname'] ?>"><?= $db['datname'] ?></a>
        </li>
        <li><a href="buttons.html">Buttons</a></li>
        <li><a href="components.html">Components</a></li>
        <li><a href="tables.html">Tables</a></li>
        <?php endforeach ?>
    </ul>
</div> <!-- sidebar -->
