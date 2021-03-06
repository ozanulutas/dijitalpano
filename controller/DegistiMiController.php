<?php

class DegistiMiController extends Controller {


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

        $degistiMi = new DegistiMi($dbc);
        $data['degisimler'] = $degistiMi->list();

        echo json_encode($data);

    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Şube Düzenle';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $sube = new Sube($dbc);
            $sube->setValues($_POST);
            $sube->update();
         
            header("Location: index.php?section=sube");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=sube");
        }
        elseif(isset($_GET['id'])) {

            $sube = new Sube($dbc);
            $data['sube'] = $sube->findBy('id', $_GET['id']); 

            $template = new Template('admin');
            $template->view('admin/sube-duzenle', $data);
        }
        else
            header("Location: index.php?section=sube");
    }


    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $sube = new Sube($dbc);
        $sube->findBy('id', $_GET['id']);
        $sube->delete();

        header("Location: index.php?section=sube");
    }

}