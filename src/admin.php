<?php
require __DIR__ . '/vendor/autoload.php';

use Securichal\TemplateEngine;
use Securichal\User;
use Securichal\UserAgentDao;
use Securichal\AdminPresenter;

$user = User::getCurrentUser();
if ($user->isAnonymous()) {
    header('Location: login.php');
    exit();
}

header('Content-Type: text/html; charset=utf-8');
$user_agent_dao  = new UserAgentDao();
$img_src         = 'img/alpaca_noob.jpg';
$img_description = 'Baby alpaca';
$img_from        = 'https://www.flickr.com/photos/tintedglass/4902881749/';
if ($user->isSuperAdministrator()) {
    $img_src         = 'img/alpaca_senior.jpg';
    $img_description = 'Alpaca';
    $img_from        = 'https://www.flickr.com/photos/teddyllovet/16901668351/';
}

$admin_presenter = new AdminPresenter(
    $user_agent_dao->getRecents(),
    $user->getName(),
    $img_src,
    $img_description,
    $img_from
);

$mustache  = TemplateEngine::getMustache();
echo($mustache->render('admin', $admin_presenter));
