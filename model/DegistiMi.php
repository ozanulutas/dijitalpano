<?php

class DegistiMi extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'degisti_mi';

        $this->fields = [
            'id',
            'tablo_adi',
            'degisti_mi'
        ];

    }
}