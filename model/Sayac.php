<?php

class Sayac extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'sayac';

        $this->fields = [
            'id',
            'etkinlik',
            'tarih',
            'saat',
            'yayin_tarih'
        ];

    }
}