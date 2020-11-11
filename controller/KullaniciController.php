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
           
            header("Location: index.php?section=kullanici");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=kullanici");
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
            header("Location: index.php?section=kullanici");
        }
        else {

            $kullanici = new Kullanici($dbc);
            $data['kullanici'] = $kullanici->findBy('id', $_SESSION['k_id']); 

            $template = new Template('admin');
            $template->view('admin/kullanici-duzenle', $data);
        }
    }


    public function deleteAction() {

        if(isset($_POST['sil'])) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $kullanici = new Kullanici($dbc);
            $kullanici->findBy('id', $_SESSION['k_id']);
            $kullanici->delete();
            
            $this->logoutAction();
        }
        else
            header("Location: index.php?section=kullanici");
    }


    public function validateAction() {

        if(isset($_POST['validate'])) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            
            $kullanici = new Kullanici($dbc);
            $mevcutKullanici = new Kullanici($dbc);
            $mevcutKullanici->findBy('id', $_SESSION['k_id']);
            $kullanici->findBy('k_adi', $_POST['k_adi']);

            if($kullanici->id && ((($mevcutKullanici->k_adi != $kullanici->k_adi) && ($_POST['currAction'] == 'edit')) || ($_POST['currAction'] == 'create')))
                echo 'Aynı isimde bir kullanıcı zaten var.';
        }
        else
            header("Location: index.php?section=kullanici");
    }


    public function logoutAction() {

        unset($_SESSION['k_id']);
        header("Location: index.php");
    }
    
}