<?php

class Slide extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'slide';

        $this->fields = [
            'id',
            'baslik',
            'metin',
            'tarih',
            'resim_id'
        ];
    }
}