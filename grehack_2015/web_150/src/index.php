<?php
require __DIR__ . '/vendor/autoload.php';

use Securichal\TemplateEngine;
use Securichal\Ifconfig;
use Securichal\HomePresenter;
use Securichal\UserAgentDao;

function isCLI($user_agent) {
    return preg_match('/^(curl|wget|fetch\\slibfetch)\\/.*$/i', $user_agent);
}

function isJSON() {
    $want = '.json';
    return substr($_SERVER['REQUEST_URI'], -strlen($want)) === $want;
}

$mustache = TemplateEngine::getMustache();
$ifconfig = new Ifconfig();

if (isJSON()) {
    header('Content-Type: application/json');
    $param = substr($_SERVER['REQUEST_URI'], 1, -5);
    if ($param === 'all') {
        echo(json_encode($ifconfig));
    } else if ($ifconfig->propertyExist($param)) {
        echo(json_encode($ifconfig->$param));
    } else {
        http_response_code(404);
        exit();
    }
} else if(isCLI($ifconfig->user_agent)) {
    header('Content-Type: text/plain');
    $param = substr($_SERVER['REQUEST_URI'], 1);
    if ($param === false) {
        echo($ifconfig->ip);
    } else if ($ifconfig->propertyExist($param)) {
        echo($ifconfig->$param);
    } else {
        http_response_code(404);
        exit();
    }
} else {
    header('Content-Type: text/html; charset=utf-8');
    $cmd        = 'curl';
    $cmd_param  = '';
    if (isset($_GET['cmd'])) {
        if ($_GET['cmd'] === 'wget') {
            $cmd       = 'wget';
            $cmd_param = '-qO -';
        } else if ($_GET['cmd'] === 'fetch') {
            $cmd       = 'fetch';
            $cmd_param = '-qo -';
        }
    }
    $home_presenter = new HomePresenter($ifconfig, $cmd, $cmd_param);
    echo($mustache->render('home', $home_presenter));
}
