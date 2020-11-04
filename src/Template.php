<?php

class Template {

    private $layout;

    public function __construct($layout) {

        $this->layout = $layout;
    }

    public function view($template, $data) {

        //extract($variables);

        include 'view/layout/' . $this->layout . '.php';
    }
}