<?php
$app->get(
    '/status',
    function() {
        return 'OK';
    }
);

//$app->get(
//    '/{page}',
//    function(Silex\Application $app, $page) {
//        return $app['main-controller']->show($page);
//    }
//);

$app->get(
    '',
    function(Silex\Application $app) {
        return $app['home-controller']->show();
    }
);
