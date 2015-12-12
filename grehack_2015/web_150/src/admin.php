<?php
require __DIR__ . '/vendor/autoload.php';

use Securichal\TemplateEngine;
use Securichal\User;
use Securichal\AdminPresenter;

$user = User::getCurrentUser();
if ($user->isAnonymous()) {
    header('Location: login.php');
    exit();
}

header('Content-Type: text/html; charset=utf-8');
$img_src         = 'img/alpaca.jpg';
$img_description = 'Happy alpaca';
$img_from        = 'https://www.flickr.com/photos/teddyllovet/16901668351/';

$admin_presenter = new AdminPresenter(
    $user->getName(),
    $img_src,
    $img_description,
    $img_from,
    'alpacas_are_not_llamas!'
);

$mustache  = TemplateEngine::getMustache();
echo($mustache->render('admin', $admin_presenter));
