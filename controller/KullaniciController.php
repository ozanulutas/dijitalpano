<?php

class KullaniciController extends Controller {

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
        $data['baslik'] = 'Kullanıcılar';

        $kullanici = new Kullanici($dbc);
        $data['kullanicilar'] = $kullanici->list();


        $template = new Template('admin');
        $template->view('admin/kullanici', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Kullanıcı Ekle';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $kullanici = new Kullanici($dbc);
            $kullanici->setValues($_POST);
            $kullanici->insert();
           
            header("Location: index.php?section=kullanici&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=kullanici&action=default");
        }
        else {
            $data['kullanici'] = new Kullanici();

            $template = new Template('admin');
            $template->view('admin/kullanici-duzenle', $data);
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Hesap Ayarları';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $kullanici = new Kullanici($dbc);
            $kullanici->setValues($_POST);
            $kullanici->update();
         
            header("Location: index.php?section=kullanici&action=edit");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=kullanici&action=edit");
        }
        else {

            $kullanici = new Kullanici($dbc);
            $data['kullanici'] = $kullanici->findBy('id', $_SESSION['k_id']); 

            $template = new Template('admin');
            $template->view('admin/kullanici-duzenle', $data);
        }
    }


    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $kullanici = new Kullanici($dbc);
        $kullanici->findBy('id', $_SESSION['k_id']);
        $kullanici->delete();

        $this->logoutAction();
    }


    public function logoutAction() {

        unset($_SESSION['k_id']);
        header("Location: index.php");
    }
    
}