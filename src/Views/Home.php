<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>PgKit - PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="stylesheet" href="/dist/css/uikit.min.css">
        <link rel="stylesheet" href="/css/pgkit.css">
        <script src="/dist/js/uikit.min.js" defer></script>
        <script src="/js/pgkit.js" defer></script>
    </head>

    <body>
        <div class="uk-offcanvas-content">
            <div uk-sticky class="uk-navbar-container tm-navbar-container uk-active">
                <div class="uk-container uk-container-expand">
                    <nav uk-navbar>
                        <div class="uk-navbar-left">
                            <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon ></a>
                            <a href="#" class="uk-navbar-item uk-logo"> PgKit </a>
                        </div>
                        <div class="uk-navbar-right uk-light">
                            <ul class="uk-navbar-nav">
                                <li class="uk-active">
                                    <a href="#">Setup<span class="ion-ios-arrow-down"></span></a>
                                </li>
                                <li class="">
                                    <a href="#">Users<span class="ion-ios-arrow-down"></span></a>
                                </li>
                                <li class="">
                                    <a href="#">Variables<span class="ion-ios-arrow-down"></span></a>
                                </li>
                                <li class="">
                                    <a href="#">Backup<span class="ion-ios-arrow-down"></span></a>
                                </li>
                                <li class="">
                                    <a href="#">Restore<span class="ion-ios-arrow-down"></span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

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

            <div class="content-padder content-background">
                <ul class="uk-breadcrumb">
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><span></span></li>
                </ul>
                <ul uk-tab>
                    <li class="uk-active"><a href="">结构</a></li>
                    <li><a href="">数据</a></li>
                    <li class="uk-disabled"><a>备份</a></li>
                </ul>
                <?php var_dump($databases) ?>
            </div>
        </div>
    </body>

</html>