<?php
require __DIR__ . '/vendor/autoload.php';

use Securichal\TemplateEngine;
use Securichal\User;

ob_start();

$user = User::getCurrentUser();

if (isset($_POST['name']) && isset($_POST['password'])) {
    $xml_db = new DOMDocument();
    $xml_db->Load('users.xml');
    $xpath = new DOMXPath($xml_db);

    $query = "//user[name/text()='" . $_POST['name'] . "' and password/text()='" . $_POST['password'] . "']";

    $result = $xpath->query($query);
    if ($result->length === 1) {
        $user->changeStatusTo(User::ADMIN);
    } else if ($result->length >= 1) {
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
