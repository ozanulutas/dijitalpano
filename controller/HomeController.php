<?php

class HomeController extends Controller {


    protected function runBeforeAction() {

        if(empty($_SESSION['k_id'])) {
            header("Location: index.php?section=login");
            return false;
        }
        return true;
    }


    public function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        $sube = new Sube($dbc);
        $slide = new Slide($dbc);
        $resim = new Resim($dbc);
        $tercih = new Tercih($dbc);
        $video = new Video($dbc);

        $data['subeler'] = $sube->list();
        $data['slidelar'] = $slide->list(null, null, ['tarih'], 'DESC');
        $data['video'] = $video->findBy('goster', true);
        // $data['video'] = $video->list('goster', true);
        $result['resimler'] = $resim->list();
        $result['tercihler'] = $tercih->list();

        // if(!$data['video']->id) {
        //     $videoEmbed = new VideoEmbed($dbc);
        //     $data['videoEmbed'] = $videoEmbed->findBy('id', 1);
        // }

        foreach($result['resimler'] as $resim) {
            $data['resimler'][$resim->id] = $resim;
        } 

        foreach($result['tercihler'] as $tercih) {
            $data['tercihler'][$tercih->ozellik] = $tercih;
        } 
        
        $template = new Template('home');
        $template->view('home/pano', $data);
    }


    public function showBySubeAction() {

        if($_POST) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $data = array();

            $sube = new Sube($dbc);
            $duyuru = new Duyuru($dbc);
            $subeDuyuru = new SubeDuyuru($dbc);
            $sayac = new Sayac($dbc);
            $subeSayac = new SubeSayac($dbc);
            $program = new Program($dbc);
            $css = new Css($dbc);

            $data['css'] = $css->list('sube_id', $_POST['sube_id'], ['name']);
            $data['sube'] = $sube->findBy('id', $_POST['sube_id']);
            
            $subeDuyurular = $subeDuyuru->list('sube_id', $_POST['sube_id']);
            $subeSayaclar = $subeSayac->list('sube_id', $_POST['sube_id']);
            
            $duyuruId = array();
            foreach($subeDuyurular as $sd) {
                $duyuruId[] = $sd->duyuru_id;         
            }

            $sayacId = array();
            foreach($subeSayaclar as $sc) {
                $sayacId[] = $sc->sayac_id;         
            }
            
            $data['duyurular'] = $duyuru->whereInBtwDate('id', $duyuruId, ['yayin_tarih', 'bitis_tarih'], ['yayin_tarih'], 'DESC'); 
            $data['sayaclar'] = $sayac->whereInBtwDate('id', $sayacId, ['yayin_tarih', 'tarih', 'saat'], ['yayin_tarih', 'tarih', 'saat'], 'ASC');  
                
            
            $result['programlar'] = $program->list('sube_id', $_POST['sube_id'], ['gun', 'saat']);
            foreach($result['programlar'] as $program) {
                $data['programlar'][$program->gun][] = $program;
            }

            echo json_encode($data);
        }
        else {
            header('Location: index.php');
        }
    }


    public function showStaticAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        $slide = new Slide($dbc);
        $resim = new Resim($dbc);
        $tercih = new Tercih($dbc);
        // $video = new Video($dbc);
        
        // $data['video'] = $video->findBy('goster', true);

        $result['tercihler'] = $tercih->list();
        foreach($result['tercihler'] as $tercih) {
            $data['tercihler'][$tercih->ozellik] = $tercih;
        } 

        $data['slidelar'] = $slide->list(null, null, ['tarih'], 'DESC');
        $result['resimler'] = $resim->list();

        foreach($result['resimler'] as $resim) {
            $data['resimler'][$resim->id] = $resim;
        } 

        echo json_encode($data);
    }
}