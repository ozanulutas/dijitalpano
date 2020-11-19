<?php

class SayacController extends Controller {


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
        $data['baslik'] = 'Etkinlik Geri Sayımı';

        $sayac = new Sayac($dbc);
        $sube = new Sube($dbc);
        $subeSayac = new SubeSayac($dbc);

        $data['sayaclar'] = $sayac->list(null, null, ['yayin_tarih, tarih'], 'DESC');

        $result['subeler'] = $sube->list();
        $data['subeler'] = array();        
        foreach ($result['subeler'] as $sube) {
            $data['subeler'][$sube->id] = $sube;
        } 
        
        $result['sube_sayac'] = $subeSayac->list();
        foreach($result['sube_sayac'] as $sd) {
            $data['sube_sayac'][$sd->sayac_id][$sd->sube_id]/**/ = $sd;
        }

        foreach($data['sayaclar'] as $sayac) { 

            if(isset($data['sube_sayac'][$sayac->id])) {
                
                $subeler = '';
                $subeFiltre = '';
                foreach ($data['sube_sayac'][$sayac->id] as $sd) {
                    $subeler .=  $data['subeler'][$sd->sube_id]->isim . ", ";
                    $subeFiltre .= "sbf-" . $data['subeler'][$sd->sube_id]->id . " ";
                }
                $subeler = rtrim($subeler, ', ');
                $data['sube'][$sayac->id] = $subeler;
                $data['subeFiltre'][$sayac->id] = $subeFiltre;
            }
        }

        $template = new Template('admin');
        $template->view('admin/sayac', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Geri Sayım Ekle';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $sayac = new Sayac($dbc);
            $sayac->setValues($_POST);
            $sayac->insert();

            $subeSayac = new SubeSayac($dbc);
            foreach($_POST['sube_id'] as $sube_id) {
                $subeSayac->setValues([
                    'sube_id' => $sube_id, 
                    'sayac_id' => $sayac->id]);
                $subeSayac->insert(); 
            } 

            header("Location: index.php?section=sayac");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=sayac");
        }
        else {
            $data['sayac'] = new Sayac();
            $sube = new Sube($dbc);
            $data['subeler'] = $sube->list();

            $template = new Template('admin');
            $template->view('admin/sayac-duzenle', $data);
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Geri Sayım Düzenle';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $sayac = new Sayac($dbc);
            $sayac->setValues($_POST);
            $sayac->update();

            $subeSayac = new SubeSayac($dbc);
            $subeSayaclar = $subeSayac->list('sayac_id', $sayac->id);

            $degistiMi = false;
            $eskiSubeId = array();

            foreach($subeSayaclar as $sd) { 
                $eskiSubeId[] = $sd->sube_id;
            }

            if(isset($_POST['sube_id'])) {
                $degistiMi = (count($_POST['sube_id']) > count($eskiSubeId)) ? array_diff($_POST['sube_id'], $eskiSubeId) : array_diff($eskiSubeId, $_POST['sube_id']);
            } 
            elseif(isset($subeSayaclar)) {
                $subeSayac->deleteBy('sayac_id', $sayac->id);
            }
            
            if($degistiMi) {
                $subeSayac->deleteBy('sayac_id', $sayac->id);
                foreach($_POST['sube_id'] as $sube_id) {
                    $subeSayac->setValues([
                        'sube_id' => $sube_id, 
                        'sayac_id' => $sayac->id]);
                    $subeSayac->insert(); 
                }
            }
         
            header("Location: index.php?section=sayac");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=sayac");
        }
        elseif(isset($_GET['id'])) {

            $sayac = new Sayac($dbc);
            $data['sayac'] = $sayac->findBy('id', $_GET['id']); 

            $sube = new Sube($dbc);
            $data['subeler'] = $sube->list(); 

            $subeSayac = new SubeSayac($dbc);
            $result['subeSayac'] = $subeSayac->list('sayac_id', $_GET['id']);
            foreach($result['subeSayac'] as $sd) {
                $data['subeSayac'][$sd->sube_id] = $sd;
            }

            $template = new Template('admin');
            $template->view('admin/sayac-duzenle', $data);
        }
        else
            header("Location: index.php?section=sayac");
    }


    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $sayac = new Sayac($dbc);
        $sayac->findBy('id', $_GET['id']);
        $sayac->delete();

        header("Location: index.php?section=sayac");
    }

}