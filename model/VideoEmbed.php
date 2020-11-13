<?php

class VideoEmbed extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'video_embed';

        $this->fields = [
            'id',
            'link'
        ];
    }
}