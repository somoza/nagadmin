<?php
use Symfony\Component\HttpFoundation\Request;
use Devture\Website\Twig\Extension\StaticFileStamperExtension;

$webroot = dirname(dirname(__FILE__)) . '/web/';
$app['twig']->addExtension(new StaticFileStamperExtension($webroot));
$app['twig']->addGlobal('layout', 'layout.html.twig');

$app->mount('/', $app['devture_nagios.controllers_provider.management']);
$app->mount('/api', $app['devture_nagios.controllers_provider.api']);

$app->get('/', function () use ($app) {
	return $app->redirect($app['url_generator']->generate('devture_nagios.dashboard'));
})->bind('homepage');