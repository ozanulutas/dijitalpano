<?php

class Kullanici extends Entity{

    public function __construct($dbc = null) {

        $this->dbc = $dbc;

        $this->tableName = 'kullanici';

        $this->fields = [
            'id',
            'k_adi',
            'sifre'
        ];
    }

    public function findUser($k_adi, $sifre) {

        $sql = "SELECT * FROM " . $this->tableName . " WHERE k_adi = :k_adi AND sifre = :sifre";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute([
            ':k_adi' => $k_adi,
            ':sifre' => $sifre
        ]);
        
        if($row = $stmt->fetch()) {

            $obj = new $this;
            $obj->setValues($row);
            return $obj;   
        }        
    }
}