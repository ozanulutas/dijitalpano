<?php

class VideoController extends Controller {

    protected function runBeforeAction() {

        if(empty($_SESSION['k_id'])) {
            header("Location: index.php");
            return false;
        }
        return true;
    }


    public function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Videolar';
        $data['action'] = 'create';

        $video = new Video($dbc);
        $thumbnail = new Thumbnail($dbc);

        $data['videolar'] = $video->list();
        $data['thumbs'] = $thumbnail->list();

        // foreach($result['videolar'] as $video) {
        //     $data['videolar'][$video->id][] = $video;
        // }

        $template = new Template('admin');
        $template->view('admin/video', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        // ESKİ
        /*
        if(isset($_POST['kaydet'])) {

            $upload = new Upload('video', VIDEO_DIR);
            if($yol = $upload->uploadFile()) {
                
                $video = new Video($dbc);
                $video->setValues(['yol' => $yol]);
                $video->insert();

                $this->thumb($video->id);
            }
        }
        else
            header("Location: index.php?section=video");*/

        $data = array();
        $data['baslik'] = 'Video Ekle';
        $data['panelBaslik']['gdrive'] = "Google Drive'dan Ekle";
        $data['panelBaslik']['sunucu'] = 'Sunucuya Yükle';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            if($_POST['kaynak'] == 'sunucu') {

                $upload = new Upload('video', VIDEO_DIR);

                if($yol = $upload->uploadFile()) {
                    
                    $_POST['yol'] = $yol;
                    $video = new Video($dbc);
                    $video->setValues($_POST);
                    $video->insert();
                }
            }
            elseif($_POST['kaynak'] == 'gdrive') {
                $video = new Video($dbc);
                $video->setValues($_POST);
                $video->insert();
                header("Location: index.php?section=video");
            }
        }
        else {
            $data['video'] = new Video();

            $template = new Template('admin');
            $template->view('admin/video-duzenle', $data);
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        /*
        // ESKİ
        if(isset($_POST['video_id'])) {
            
            if($_POST['command'] == 'yayinla') {
                
                $video = new Video($dbc);
                $video->findBy('goster', true);
                $video->goster = null;
                $video->update();
                
                // $video = new Video($dbc);
                $video->findBy('id', $_POST['video_id']);
                $video->goster = true;
                $video->update();
                
                if($video)
                    echo 'Video yayında.';
            }
            elseif($_POST['command'] == 'yayindanKaldir') {
                
                $video = new Video($dbc);
                $video->findBy('id', $_POST['video_id']);
                $video->goster = null;
                $video->update();
                
                if($video)
                    echo 'Video yayından kaldırıldı.';
            }
        }
        */

        $data = array();
        $data['baslik'] = 'Video Düzenle';
        $data['panelBaslik']['gdrive'] = 'Google Drive Videosu Düzenle';
        $data['panelBaslik']['sunucu'] = 'Sunucu Videosu Düzenle';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $video = new Video($dbc);
            if($_POST['kaynak'] == 'sunucu') {
                $video->findBy('id', $_POST['id']);
                $video->isim = $_POST['isim'];
                $video->update();
            }
            elseif($_POST['kaynak'] == 'gdrive') {
                $video->setValues($_POST);
                $video->update();
            }
         
            header("Location: index.php?section=video");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=video");
        }
        elseif(isset($_GET['id'])) {

            $video = new Video($dbc);
            $data['video'] = $video->findBy('id', $_GET['id']); 

            $template = new Template('admin');
            $template->view('admin/video-duzenle', $data);
        }
        else
            header("Location: index.php?section=video");
    }


    public function deleteAction() {        

        if(isset($_GET['id'])) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $video = new Video($dbc);
            
            $video->findBy('id', $_GET['id']);
            $video->delete();     
            if(file_exists($video->yol)) {
                unlink($video->yol); 
            }
        }
        
        header("Location: index.php?section=video");
    }


    public function publishAction() {

        if(!empty($_POST['id'])) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $ids = array();
            parse_str($_POST['id'], $ids);
            $video = new Video($dbc);

            foreach($ids['id'] as $id) {
                $video->findBy('id', $id);
                $video->goster = true;
                $video->update();
            }
            echo 'Videolar yayında.';
        }
    }


    public function unpublishAction() {

        if(!empty($_POST['id'])) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $ids = array();
            parse_str($_POST['id'], $ids);
            $video = new Video($dbc);

            foreach($ids['id'] as $id) {
                $video->findBy('id', $id);
                $video->goster = null;
                $video->update();
            }
            echo 'Videolar yayından kaldırıldı.';
        }
    }

/*
    public function embedAction() {

        if($_POST) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $video = new Video($dbc);

            if($video->findBy('goster', true)->id) {
                echo 'err';                
            }
            else {                
                $videoEmbed = new VideoEmbed($dbc);
                $videoEmbed->findBy('id', 1);

                if(!empty($videoEmbed->id)) {
                    $videoEmbed->link = $_POST['link'];
                    $videoEmbed->update();
                }
                else {
                    $videoEmbed->setValues($_POST);
                    $videoEmbed->insert();
                }
                echo "succ";
            }
        }
        else
            header("Location: index.php?section=video");
    }*/

/*
    public function deleteAction() {        

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        
        $video = new Video($dbc);
        $thumbnail = new Thumbnail($dbc);

        $video->findBy('id', $_POST['video_id']);
        $thumbnail->findBy('video_id', $_POST['video_id']);
        $video->delete();     
        unlink($video->yol); 
        unlink($thumbnail->yol); 
        
        header("Location: index.php?section=video");
    }
*/

    public function ajaxAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        if(isset($_POST['command']) && isset($_POST['video_id'])) {

            if($_POST['command'] == 'show') {
                
                $video = new Video($dbc);
                $data['video'] = $video->findBy('id', $_POST['video_id']);

                echo json_encode($data);
            }
        }
        else
            header("Location: index.php?section=video");
    }
    
/*
    public function thumb($video_id) {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $upload = new Upload('img', IMG_THUMB_DIR);
        $upload->uploadFromUri($_POST['fname'], $_POST['uri']);

        $thumbnail = new Thumbnail($dbc);
        $thumbnail->setValues([
            'yol' => IMG_THUMB_DIR . $_POST['fname'],
            'video_id' => $video_id]);
        $thumbnail->insert();
    } 
*/

}