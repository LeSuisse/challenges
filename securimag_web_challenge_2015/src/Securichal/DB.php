<?php
namespace Securichal;

class DB {
    protected static $db;

    private function __construct() {
        try {
            self::$db = new \PDO('mysql:host=db;dbname='.$_ENV['MYSQL_DATABASE'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
        } catch (\PDOException $e) {
            echo('DB connection error. Code: ' . $e->getCode());
            exit();
        }
    }

    public static function instance() {
        if (!isset(self::$db)) {
            new DB();
        }
        return self::$db;
    }
}
