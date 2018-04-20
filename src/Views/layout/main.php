<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>PgKit - PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Mono:400,500,700">
        <link rel="stylesheet" href="/dist/css/uikit.min.css">
        <link rel="stylesheet" href="/css/pgkit.css">
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/dist/js/uikit.min.js"></script>
        <script src="/dist/js/uikit-icons.min.js"></script>
    </head>

    <body>
        <?=$this->insert('shared/navbar')?>

        <?=$this->insert('shared/sidebar')?>

        <div class="uk-offcanvas-content content-padder content-background">
            <?=$this->section('content')?>
        </div>

        <script src="/js/pgkit.js"></script>
    </body>
</html>
