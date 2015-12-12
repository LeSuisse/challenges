<?php
require __DIR__ . '/vendor/autoload.php';

use Securichal\TemplateEngine;
use Securichal\User;
use JsonPath\JsonObject;

ob_start();

$user = User::getCurrentUser();

if (isset($_POST['name']) && isset($_POST['password'])) {
    $query       = "$..members[?(@.name=='". $_POST['name'] ."' and @.password=='". $_POST['password'] ."')]";
    $data        = file_get_contents('users.json');
    $json_object = new JsonObject($data);
    try {
        $result      = $json_object->get($query);
    } catch (Exception $e) {
        trigger_error(get_class($e) . ' ' . $e->getMessage(), E_USER_WARNING);
    }

    if ($result !== false && count($result) === 1) {
        $user->changeStatusTo(User::ADMIN);
    } else if ($result !== false && count($result) > 1) {
        trigger_error('Unexpected behavior: multiple users match the query', E_USER_WARNING);
    }
}

if (!$user->isAnonymous()) {
    header('Location: admin.php');
    exit();
}

header('Content-Type: text/html; charset=utf-8');
$mustache = TemplateEngine::getMustache();
echo($mustache->render('login'));

ob_end_flush();
