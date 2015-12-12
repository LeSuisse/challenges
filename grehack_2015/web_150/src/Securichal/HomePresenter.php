<?php
namespace Securichal;

class HomePresenter {
    public $address;
    private $ifconfig;
    public $cmd;
    public $cmd_param;

    public function __construct(Ifconfig $ifconfig, $cmd, $cmd_param) {
        $this->address   = $_SERVER['HTTP_HOST'];
        $this->ifconfig  = $ifconfig;
        $this->cmd       = $cmd;
        $this->cmd_param = $cmd_param;
    }

    public function ip() {
        return $this->ifconfig->ip;
    }

    public function data() {
        $res = array();
        foreach ($this->ifconfig as $key => $value) {
            if ($key !== 'ip') {
                $res[] = array('key' => $key, 'value' => $value);
            }
        }
        return new \ArrayIterator($res);
    }

    public function json() {
        return json_encode($this->ifconfig, JSON_PRETTY_PRINT);
    }
}
