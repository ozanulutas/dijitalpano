<?php

class TercihController extends Controller {


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
        $data['baslik'] = 'Tercihler';

        $sube = new Sube($dbc);
        $tercih = new Tercih($dbc);

        $data['subeler'] = $sube->list();
        $result['tercihler'] = $tercih->list();

        foreach($result['tercihler'] as $tercih) {
            $data['tercihler'][$tercih->ozellik] = $tercih;
        }

        $template = new Template('admin');
        $template->view('admin/tercih', $data);
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        if($_POST) {            

            $tercih = new Tercih($dbc);
                
            for($i = 0; $i < count($_POST['ozellik']); $i++) {

                $tercih->findBy('ozellik', $_POST['ozellik'][$i]['value']);
                $tercih->ozellik = $_POST['ozellik'][$i]['value'];
                $tercih->deger = ($tercih->ozellik == 'slide_hiz') ? $_POST['deger'][$i]['value'] * 1000 : $_POST['deger'][$i]['value'];
                
                $tercih->update();                
            }
            
            echo 'Tercihler güncellendi.';            
        }
        else
            header('Location: index.php?section=tercih');
    }
}