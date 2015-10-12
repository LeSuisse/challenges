<?php
namespace Securichal;

class UserAgentDao {
    private $db;

    public function __construct() {
        $this->db = DB::instance();
    }

    public function add($user_agent) {
        $stmt               = $this->db->prepare('INSERT INTO useragent(val) VALUES (?)');
        $stmt->bindParam(1, $user_agent);
        $stmt->execute();
    }

    public function getRecents() {
        $stmt = $this->db->query('SELECT val FROM useragent WHERE date > date_sub(now(), interval 2 minute)');
        return $stmt->fetchAll();
    }
}
