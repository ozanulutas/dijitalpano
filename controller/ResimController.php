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

        if(isset($_POST['kaydet'])) {

            $upload = new Upload('img', IMG_SLIDE_DIR);
            if($yol = $upload->uploadFile()) {
                
                $resim = new Resim($dbc);
                $resim->setValues(['yol' => $yol]);
                $resim->insert();
            }      
        }
        else
            header("Location: index.php?section=resim");
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
        header("Location: index.php?section=resim");
    }

}