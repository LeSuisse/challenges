<?php
namespace Securichal;

class Ifconfig {
    private $fields = array(
        'ip'              => 'REMOTE_ADDR',
        'user_agent'      => 'HTTP_USER_AGENT',
        'accept'          => 'HTTP_ACCEPT',
        'accept-encoding' => 'HTTP_ACCEPT_ENCODING',
        'accept-charset'  => 'HTTP_ACCEPT_CHARSET',
        'accept-language' => 'HTTP_ACCEPT_LANGUAGE',
        'referer'         => 'HTTP_REFERER'
    );

    public function __construct() {
        foreach ($this->fields as $attribute => $server) {
            if (isset($_SERVER[$server]) && $_SERVER[$server] !== '') {
                $this->$attribute = $_SERVER[$server];
            }
        }
    }

    public function propertyExist($property) {
        return isset($this->$property);
    }
}
