<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $model->getTitle() ?></title>
        <link rel="stylesheet" type="text/css" href="<?= $staticDir; ?>/css/vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= $staticDir; ?>/css/vendor/bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?= $staticDir; ?>/css/main.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= $model->getTitle() ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <? foreach($navBar->getNavBar() as $title): ?>
                            <li><a href="#<?= $title['name'] ?>"><?= $title['title']?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container theme-showcase" role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <h1><?= $model->getTitle() ?></h1>
                <p>Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero. And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass. </p>
                <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
            </div>

            <? foreach($model->getSections() as $section): ?>
                <div class="page-header">
                    <a id="<?=$section->getId() ?>"></a><h2><?= $section->getTitle() ?></h2>

                    <? if($section->getIntro()): ?>
                        <p class="section-intro"><?= $section->getIntro() ?></p>
                    <? endif; ?>

                    <? if($section->getParagraphs()): ?>
                        <? foreach($section->getParagraphs() as $paragraph): ?>
                            <p><?= $paragraph ?></p>
                        <? endforeach; ?>
                    <? endif; ?>
                </div>
            <? endforeach; ?>

        </div> <!-- /container -->

        <!-- Placed down here so that the document loads first -->
        <script src="<?= $staticDir; ?>/js/controller.js"></script>
        <script src="<?= $staticDir; ?>/js/vendor/jquery/jquery.min.js"></script>
        <script src="<?= $staticDir; ?>/js/vendor/bootstrap/bootstrap.min.js"></script>

    </body>
</html>