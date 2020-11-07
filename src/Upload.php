<?php

class Upload {

    public $media;
    public $targetDir;
    public $targetFile;
    // public $uri;

    private $uploadOk;


    public function __construct($media, $targetDir) {
        $this->media = $media;
        $this->targetDir = $targetDir;
        $this->uploadOk = 1;
    }


    public function uploadFile() {
        
        $this->targetFile = $this->targetDir . basename($_FILES['yol']['name']);
        $fileType = strtolower(pathinfo($this->targetFile, PATHINFO_EXTENSION));

        if(file_exists($this->targetFile)) {
            echo "Aynı isimde bir dosya zaten var!";
            $this->uploadOk = 0;
        }

        if($this->media == 'img') {
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
                echo "Sadece JPG, JPEG, PNG & GIF formatındaki resimler desteklenmektedir.";
                $this->uploadOk = 0;
            }

        } elseif($this->media == 'video') {
            if($fileType != "mp4" && $fileType != "avi" && $fileType != "mov" && $fileType != "3gp" && $fileType != "mpeg") {
                echo "Sadece MP4, AVI, MOV, 3GP & MPEG formatındaki videolar desteklenmektedir.";
                $this->uploadOk = 0;
            }

        } elseif($this->media == 'sheet') {
            if($fileType != "xls" && $fileType != "csv" && $fileType != "xlsx") {
                echo "Sadece XLS, XLSX, CSV formatındaki dosyalar desteklenmektedir.";
                $this->uploadOk = 0;
            }
        }

        if ($this->uploadOk == 0) {
            echo "Dosya desteklenmiyor.";
        } else {                        
            if (move_uploaded_file($_FILES["yol"]["tmp_name"], $this->targetFile)) {

                return $this->targetFile;

            } else {
                echo "Dosya yüklenirken bir hata oluştu.";                
            }
        }   

        return false;
    }


    public function uploadFromUri($fname, $uri) {

        file_put_contents($this->targetDir . $fname, file_get_contents("data://" . $uri));
    }

}