<?php

class HomeController extends Controller {

    public function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        $sube = new Sube($dbc);
        $slide = new Slide($dbc);
        $resim = new Resim($dbc);

        $data['subeler'] = $sube->list();
        $data['slidelar'] = $slide->list(null, null, ['tarih'], 'DESC');
        $result['resimler'] = $resim->list();

        foreach($result['resimler'] as $resim) {
            $data['resimler'][$resim->id] = $resim;
        } 
        
        $template = new Template('home');
        $template->view('pano', $data);
    }


    public function showAction() {

        if($_POST) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $data = array();

            $duyuru = new Duyuru($dbc);
            $sube = new Sube($dbc);
            $subeDuyuru = new SubeDuyuru($dbc);
            $program = new Program($dbc);
            $css = new Css($dbc);

            $data['css'] = $css->list('sube_id', $_POST['sube_id'], ['name']);
            $data['sube'] = $sube->findBy('id', $_POST['sube_id']);
            
            $subeDuyurular = $subeDuyuru->list('sube_id', $_POST['sube_id']);
            
            $duyuruId = array();
            foreach($subeDuyurular as $sd) {
                $duyuruId[] = $sd->duyuru_id;         
            }
            
            $data['duyurular'] = $duyuru->whereInBtwDate('id', $duyuruId, ['yayin_tarih'], 'DESC');                
            
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
    

    public function loginAction() {

        if($_POST) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $data = array();

            $kullanici = new Kullanici($dbc);
            $data['kullanici'] = $kullanici->findUser($_POST['k_adi'], $_POST['sifre']);
            
            // echo "<pre>";
            // print_r($data['kullanici']);
            // echo "</pre>";
            
            if($data['kullanici']) {
                $_SESSION['k_id'] = $data['kullanici']->id;
                
                echo json_encode($_SESSION);
            } else {
                echo json_encode("Kullanıcı adı veya şifre hatalı");
            }
        } 
        else {
            header('Location: index.php');
        }
    }
}