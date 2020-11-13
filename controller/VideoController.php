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

        $result['videolar'] = $video->list();
        $data['thumbs'] = $thumbnail->list();

        foreach($result['videolar'] as $video) {
            $data['videolar'][$video->id][] = $video;
        }

        $template = new Template('admin');
        $template->view('admin/video', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

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
            header("Location: index.php?section=video");
    }

    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

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
    }


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
    }


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


}