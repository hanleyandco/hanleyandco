<?php
$app->get(
    '/status',
    function() {
        return 'OK';
    }
);

$app->get(
    '/{page}',
    function(Silex\Application $app, $page) {
        return $app['main-controller']->show($page);
    }
);