<?php

class Video extends Entity{

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'video';

        $this->fields = [
            'id',
            'yol',
            'goster'
        ];
    }
}