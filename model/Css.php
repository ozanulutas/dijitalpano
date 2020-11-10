<?php

class Css extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'css';

        $this->fields = [
            'id',
            'name',
            'value',
            'sube_id'
        ];

    }
}