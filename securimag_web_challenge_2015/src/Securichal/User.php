<?php
namespace Securichal;

class User {
    const ANONYMOUS   = 'no_cookie';
    const ADMIN       = 'Rmlyc3QgZmxhZyB2YWxpZGF0ZWQuIEdvIGdldCB0aGUgc3VwZXIgYWRtaW4gZmxhZyBub3ch';
    const SUPER_ADMIN = 'TGV0J3MgZ28gZ3JhYiBhIGJlZXIgby8=';

    private $status;

    private function __construct($status) {
        $this->status = $status;
    }

    public function isAnonymous() {
        return $this->status === self::ANONYMOUS;
    }

    public function isAdministrator() {
        return $this->status === self::ADMIN;
    }

    public function isSuperAdministrator() {
        return $this->status === self::SUPER_ADMIN;
    }

    public function getName() {
        switch ($this->status) {
            case self::ADMIN:
                return 'admin';
            case self::SUPER_ADMIN:
                return 'super admin';
            default:
                return 'visitor';
        }
    }

    public function changeStatusTo($status) {
        switch ($status) {
            case self::ANONYMOUS:
                $this->logout();
                break;
            case self::ADMIN:
            case self::SUPER_ADMIN:
                $this->status = $status;
                setcookie('flag', $status);
                break;
            default:
                break;
        }
    }

    public function logout() {
        $this->status = self::ANONYMOUS;
        setcookie('flag', '', time()-3600);
    }

    public static function getCurrentUser() {
        if (isset($_COOKIE['flag']) && ($_COOKIE['flag'] === self::ADMIN || $_COOKIE['flag'] === self::SUPER_ADMIN)) {
            return new User($_COOKIE['flag']);
        } else {
            return new User(self::ANONYMOUS);
        }
    }
}
