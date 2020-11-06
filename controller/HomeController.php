<?php

class HomeController extends Controller {

    public function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        $sube = new Sube($dbc);
        // $duyuru = new Duyuru($dbc);
        // $subeDuyuru = new SubeDuyuru($dbc);
        $slide = new Slide($dbc);
        $resim = new Resim($dbc);

        $data['subeler'] = $sube->list();

        // $subeDuyurular = $subeDuyuru->list('sube_id', 1);  

        // $id = array();
        // foreach($subeDuyurular as $sd) {
        //     $id[] = $sd->duyuru_id;         
        // }        

        // $data['duyurular'] = $duyuru->whereIn('id', $id);


        $data['slidelar'] = $slide->list();
        $result['resimler'] = $resim->list();

        foreach($result['resimler'] as $resim) {
            $data['resimler'][$resim->id] = $resim;
        }
   
        // $program = new Program($dbc);
        // $data['programlar'] = $program->list('sube_id', 2, ['saat']);
        // echo "<pre>";
        // print_r($data['programlar']);
        // echo "</pre>";    
        
        $template = new Template('home');
        $template->view('pano', $data);

    }


    public function ajaxAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        if(isset($_POST['command'])) {
            if($_POST['command'] == 'goster') {

                $duyuru = new Duyuru($dbc);
                $sube = new Sube($dbc);
                $subeDuyuru = new SubeDuyuru($dbc);
                $program = new Program($dbc);

                $data['sube'] = $sube->findBy('id', $_POST['sube_id']);
                
                $subeDuyurular = $subeDuyuru->list('sube_id', $_POST['sube_id']);
                
                $duyuruId = array();
                foreach($subeDuyurular as $sd) {
                    $duyuruId[] = $sd->duyuru_id;         
                }
                
                $data['duyurular'] = $duyuru->whereInBtwDate('id', $duyuruId);                
                
                $result['programlar'] = $program->list('sube_id', $_POST['sube_id'], ['gun', 'saat']);
                foreach($result['programlar'] as $program) {
                    $data['programlar'][$program->gun][] = $program;
                }
    
                echo json_encode($data);

            }
        }
    }
    

    public function loginAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        $kullanici = new Kullanici($dbc);
        $data = $kullanici->findUser(@$_POST['k_adi'], @$_POST['sifre']);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        if($data) {
            $_SESSION['k_id'] = $data->id;

            // $template = new Template('admin');
            // $template->view('admin/default', $data);

            header("Location: index.php?section=sube&action=default");
        }
        else {
            header("Location: index.php");
        }
    }
}