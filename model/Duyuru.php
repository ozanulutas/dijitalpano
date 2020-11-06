<?php

class Duyuru extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'duyuru';

        $this->fields = [
            'id',
            'metin',
            'yayin_tarih',
            //'yayin_saat',
            'bitis_tarih',
            //'bitis_saat'
            //'goster'
        ];

    }
}