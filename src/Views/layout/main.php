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
        <link rel="stylesheet" href="/css/notyf.min.css">
        <script src="/js/jquery.min.js"></script>
        <script src="/dist/js/uikit.min.js"></script>
        <script src="/dist/js/uikit-icons.min.js"></script>
    </head>

    <body>
        <?=$this->insert('shared/navbar')?>

        <?=$this->insert('shared/sidebar')?>

        <div class="content-padder content-background">
            <?=$this->section('content')?>
        </div>


        <script src="/js/jquery.transit.js"></script>
        <script src="/js/notyf.min.js"></script>
        <script src="/js/pgkit.js"></script>
        <div class="notyf"></div>
    </body>
</html>
