<?php

class ResimController extends Controller {

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
        $data['baslik'] = 'Resimler';
        $data['action'] = 'create';

        $resim = new Resim($dbc);
        $data['resimler'] = $resim->list();

        $template = new Template('admin');
        $template->view('admin/resim', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Resim Ekle';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $resim = new Resim($dbc);
            $resim->upload('img');
      
            header("Location: index.php?section=resim&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=resim&action=default");
        }
        else {
            $data['resim'] = new Resim();

            $template = new Template('admin');
            $template->view('admin/resim', $data);
        }
    }


    public function deleteAction() {

        if(isset($_POST['id'])) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $resim = new Resim($dbc);
            $data['resimler'] = $resim->whereIn('id', $_POST['id']);
            $resim->deleteIn('id', $_POST['id']);
            
            foreach($data['resimler'] as $resim) {
                unlink($resim->yol);
            }            
        }
        header("Location: index.php?section=resim&action=default");
    }

}