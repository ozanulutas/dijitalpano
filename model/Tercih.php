<?php

class Tercih extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'tercih';

        $this->fields = [
            'id',
            'ozellik',
            'deger'
        ];

    }
}