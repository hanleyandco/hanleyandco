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

            <? foreach($model->getSections() as $section): ?>
                <div class="section">

                    <div class="page-header">
                        <a id="<?=$section->getId() ?>"></a><h2><?= $section->getTitle() ?></h2>
                    </div>

                    <? if($section->getImage()): ?>
                        <img class="img-thumbnail" src="<?= $staticDir ?>/images/<?= $section->getImage() ?>" />
                    <? endif; ?>

                    <? if($section->getIntro()): ?>
                        <p class="section-intro"><?= $section->getIntro() ?></p>
                    <? endif; ?>

                    <? if($section->getParagraphs()): ?>
                        <? foreach($section->getParagraphs() as $paragraph): ?>
                            <p><?= $paragraph ?></p>
                        <? endforeach; ?>
                    <? endif; ?>

                    <? if($section->getQuotes()): ?>
                        <? foreach($section->getQuotes() as $quote): ?>
                            <blockquote class="quote">
                                <p class="text"><?= $quote->getText() ?></p>
                                <p class="attribution-name"><?= $quote->getName() ?></p>
                                <p class="attribution-company"><?= $quote->getCompany() ?></p>
                            </blockquote>
                        <? endforeach; ?>
                    <? endif; ?>

                    <? if($section->getLinks()): ?>
                        <? foreach($section->getLinks() as $link): ?>
                            <a class="external-link" href="<?= $link->getUrl() ?>" title="<?= $link->getTitle() ?>"><?= $link->getText() ?></a>
                        <? endforeach; ?>
                    <? endif; ?>

                </div>
            <? endforeach; ?>

        </div> <!-- /container -->

        <footer>
            <div class="images">
                <? if($footer->getImages()): ?>
                    <? foreach($footer->getImages() as $image) : ?>
                        <img class="img-thumbnail logo" src="<?= $staticDir ?>/images/<?= $image ?>" />
                    <? endforeach; ?>
                <? endif; ?>
            </div>

            <? if($footer->getCopyRight()): ?>
                <p class="copyright"><?= $footer->getCopyright(); ?></p>
            <? endif; ?>

            <? if($footer->getText()): ?>
                <p class="footer-text">
                    <? foreach($footer->getText() as $line): ?>
                        <?= $line ?><br />
                    <? endforeach; ?>
                </p>
            <? endif; ?>

            <? if($footer->getLinks()): ?>
                <ul class="footer-nav">
                    <? foreach($footer->getLinks() as $link): ?>
                        <li><a class="link-<?= $link->name ?>" href="<?= $link->url ?>"><?= $link->text ?></a></li>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>
        </footer>

        <!-- Placed down here so that the document loads first -->

        <script src="<?= $staticDir; ?>/js/vendor/requirejs/require.js"></script>
        <script src="<?= $staticDir; ?>/js/vendor/jquery/jquery.min.js"></script>
        <script src="<?= $staticDir; ?>/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?= $staticDir; ?>/js/controller.js"></script>

        <script>
            require(["hanleyandco/controller"], function(Controller) {
                var controller = new Controller(document);
                controller.init();
            });
        </script>

    </body>
</html>