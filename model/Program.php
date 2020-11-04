<?php

class Program extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'program';

        $this->fields = [
            'id',
            'gun',
            'saat',
            'etkinlik',
            'sube_id'
        ];
    }
}