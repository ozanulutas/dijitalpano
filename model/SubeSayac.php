<?php

class SubeSayac extends Entity {

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'sube_sayac';

        $this->fields = [
            'id',
            'sube_id',
            'sayac_id'
        ];
    }
    
}