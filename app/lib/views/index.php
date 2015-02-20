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

    <body role="document" itemscope itemtype="http://schema.org/LocalBusiness">

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

        <div class="theme-showcase" role="main">

            <? if($section = $model->getHeaderSection()): ?>
                <div class="section header-section">
                    <div class="content">

                        <div class="title">
                            <h1 itemprop="name"><?= $section->getTitle() ?></h1>
                        </div>

                        <div class="subTitle">
                            <h3 itemprop="description"><?= $section->getSubTitle() ?></h3>
                        </div>

                        <div class="tagLine">
                            <h4><?= $section->getTagLine() ?></h4>
                        </div>

                        <? if($section->getImage()): ?>
                            <img class="img-thumbnail" src="<?= $staticDir ?>/images/<?= $section->getImage() ?>" itemprop="<?= $staticDir ?>/images/<?= $section->getImage() ?>"/>
                        <? endif; ?>

                    </div>
                </div>
            <? endif; ?>

            <? foreach($model->getSections() as $section): ?>
                <div class="section">
                    <div class="content">

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

                        <? if($section->getLinks()): ?>
                            <? foreach($section->getLinks() as $link): ?>
                                    <a class="external-link" href="<?= $link->getUrl() ?>" title="<?= $link->getTitle() ?>"><?= $link->getText() ?></a>
                                <br />
                            <? endforeach; ?>
                        <? endif; ?>

                        <? if($section->getContact()): ?>
                            <? $contact = $section->getContact(); ?>
                            <p>
                                Open <time itemprop="openingHours" datetime="<?= $contact->getOpeningHoursSchema() ?>"><?= $contact->getOpeningHoursText() ?></time>
                            </p>
                            <a class="external-link" itemprop="telephone" href="tel://<?= $contact->getTelephone() ?>"><?= $contact->getTelephone() ?></a>
                            <a class="external-link" itemprop="email" href="mailto:<?= $contact->getEmail() ?>"><?= $contact->getEmail() ?></a>
                        <? endif; ?>
                    </div>
                </div>
                <? if($section->getQuote()): ?>
                    <div class="quote">
                        <div class="content">
                            <p class="text">"<?= $section->getQuote()->getText() ?>"</p>
                            <p class="attribution-name"><?= $section->getQuote()->getName() ?></p>
                            <p class="attribution-company"><?= $section->getQuote()->getCompany() ?></p>
                        </div>
                    </div>
                <? endif; ?>
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
                <? if($footer->getRegisteredOffice()): ?>
                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">Registered Address: <span itemprop="streetAddress"><?= $footer->getRegisteredOffice() ?></span></span><br />
                <? endif; ?>

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