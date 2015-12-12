<?php
namespace Securichal;

class AdminPresenter {
    public $user_name;
    public $img_src;
    private $img_description;
    private $img_from;
    public $flag;

    public function __construct($user_name, $img_src, $img_description, $img_from, $flag) {
        $this->user_name       = $user_name;
        $this->img_src         = $img_src;
        $this->img_description = $img_description;
        $this->img_from        = $img_from;
        $this->flag            = $flag;
    }

    public function img_alt() {
        return $this->img_description;
    }

    public function img_title() {
        return $this->img_description . ' — ' . $this->img_from;
    }
}
