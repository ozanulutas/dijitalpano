<?php

class Thumbnail extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'thumbnail';

        $this->fields = [
            'id',
            'yol',
            'video_id'
        ];
    }
}