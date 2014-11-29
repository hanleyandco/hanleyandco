<html>
    <head>
        <title><?= $model->getTitle() ?></title>
        <link rel="stylesheet" type="text/css" href="<?= $staticDir; ?>/css/vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= $staticDir; ?>/css/vendor/bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?= $staticDir; ?>/css/main.css">

    </head>
    <h1><?= $model->getTitle() ?></h1>
    <body>
        <p>It works!</p>


        <!-- Placed down here so that the document loads first -->
        <script src="<?= $staticDir; ?>/js/controller.js"></script>
        <script src="<?= $staticDir; ?>/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?= $staticDir; ?>/js/vendor/jquery/jquery.min.js"></script>

    </body>
</html>