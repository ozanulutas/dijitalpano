<?php

class Resim extends Entity{

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'resim';

        $this->fields = [
            'id',
            'yol'
        ];
    }
}