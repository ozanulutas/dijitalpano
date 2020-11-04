<?php

class SubeDuyuru extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'sube_duyuru';

        $this->fields = [
            'id',
            'sube_id',
            'duyuru_id'
        ];
    }
    
}