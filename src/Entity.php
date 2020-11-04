<?php

class Entity {

    protected $dbc;
    protected $tableName;
    protected $fields;


    public function setValues($values = array()) {

        foreach ($this->fields as $fieldName) {
            $this->$fieldName = isset($values[$fieldName]) ? $values[$fieldName] : NULL;
            //$this->$fieldName = $values[$fieldName];
        }
    }


    public function findBy($fieldName, $fieldValue) {        

        $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . " = :value";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);
        $row = $stmt->fetch();
        
        // $obj = new $this;
        // $obj->setValues($row);
        $this->setValues($row);

        //return $obj;
        return $this;
    }


    public function list($fieldName = null, $fieldValue = null) {

        $where = $fieldName ? " WHERE $fieldName = :value" : "";

        $sql = "SELECT * FROM " . $this->tableName . $where;
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);

        $list = array();
        while ($row = $stmt->fetch()) {
            $obj = new $this;
            $obj->setValues($row);
            $list[] = $obj;
        }

        return $list;
    }


    public function whereIn($fieldName, $fieldValues = array()) {

        $in = str_repeat('?, ', count($fieldValues) - 1) . '?';
        $sql = "SELECT * FROM " . $this->tableName . " WHERE $fieldName IN ($in)";

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($fieldValues);

        $list = array();
        while ($row = $stmt->fetch()) {
            $obj = new $this;
            $obj->setValues($row);
            $list[] = $obj;
        }

        return $list;
    }


    public function whereInByDate($fieldName, $fieldValues = array()) {

        $in = str_repeat('?, ', count($fieldValues) - 1) . '?';
        $sql = "SELECT * FROM " . $this->tableName . " WHERE $fieldName IN ($in) AND yayin_tarih <= curdate() AND bitis_tarih >= curdate()";

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($fieldValues);

        $list = array();
        while ($row = $stmt->fetch()) {
            $obj = new $this;
            $obj->setValues($row);
            $list[] = $obj;
        }

        return $list;
    }


    public function insert() {

        $param = array();

        $sql = "INSERT INTO " . $this->tableName . " (";
        foreach (array_slice($this->fields, 1) as $fieldName) {
            $sql .= "$fieldName, ";
        }
        $sql = rtrim($sql, ', ');        
        $sql .= ") VALUES (";
        foreach (array_slice($this->fields, 1) as $fieldName) {
            $sql .= ":$fieldName, ";
            $param[$fieldName] = $this->$fieldName;
        }
        $sql = rtrim($sql, ', ');
        $sql .= ")";
        
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($param);

        $this->id = $this->dbc->lastInsertId();
    }

    public function update() {

        $updFields = $this->fields;
        $id = array_shift($updFields);        
        
        $sql = "UPDATE " . $this->tableName . " SET ";
        foreach ($updFields as $fieldName) {
            $sql .= "$fieldName = :$fieldName, ";
            $param[$fieldName] = $this->$fieldName;
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE $id = :$id";
        
        $param[$id] = $this->$id;
        
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($param);

       
        // echo "<pre>";
        // print_r($this->fields);
        // echo "</pre>";
    }


    public function delete() {

        $value = $this->fields[0];

        $sql = "DELETE FROM " . $this->tableName . " WHERE " . $this->fields[0] . " = :value";
        $stmt = $this->dbc->prepare($sql);
        
        $stmt->execute([':value' => $this->$value]);
    }

    public function deleteBy($fieldName = null, $fieldValue = null) {

        $sql = "DELETE FROM " . $this->tableName . " WHERE $fieldName = :value";

        $stmt = $this->dbc->prepare($sql);
        
        $stmt->execute([':value' => $fieldValue]);
    }

    public function deleteIn($fieldName, $fieldValues = array()) {

        $in = str_repeat('?, ', count($fieldValues) - 1) . '?';
        $sql = "DELETE FROM " . $this->tableName . " WHERE $fieldName IN ($in)";

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($fieldValues);
    }


    public function upload($media) {

        if($media == 'img')
            $targetDir = UPLOAD_DIR . 'img/slide/';
        elseif($media == 'video')
            $targetDir = UPLOAD_DIR . 'video/';
        
        $targetFile = $targetDir . basename($_FILES['yol']['name']);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if(file_exists($targetFile)) {
            echo "Aynı isimde bir dosya zaten var!";
            $uploadOk = 0;
        }

        if($media == 'img') {
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
                echo "Sadece JPG, JPEG, PNG & GIF formatındaki resimler desteklenmektedir.";
                $uploadOk = 0;
            }
        }
        elseif($media == 'video') {
            if($fileType != "mp4" && $fileType != "avi" && $fileType != "mov" && $fileType != "3gp" && $fileType != "mpeg") {
                echo "Sadece MP4, AVI, MOV, 3GP & MPEG formatındaki videolar desteklenmektedir.";
                $uploadOk = 0;
            }
        }

        if ($uploadOk == 0) {
            echo "Dosya desteklenmiyor.";
        }
        else {                        
            if (move_uploaded_file($_FILES["yol"]["tmp_name"], $targetFile)) {
                echo htmlspecialchars( basename( $_FILES["yol"]["name"])). " dosyası başarıyla yüklendi.";
                //$data['yol'] = $targetFile;
                $this->setValues(['yol' => $targetFile]);
                $this->insert();
            } 
            else {
                echo "Dosya yüklenirken bir hata oluştu.";                
            }
        }   
    }

}