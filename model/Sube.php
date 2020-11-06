<?php

class Sube extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'sube';

        $this->fields = [
            'id',
            'isim',
            'adres'
        ];
    }
    
}