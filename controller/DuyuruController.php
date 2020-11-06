<?php

class DuyuruController extends Controller{


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
        $data['baslik'] = 'Duyurular';

        $duyuru = new Duyuru($dbc);        
        $sube = new Sube($dbc);
        $subeDuyuru = new SubeDuyuru($dbc);

        $data['duyurular'] = $duyuru->list();     
        
        $result['subeler'] = $sube->list();
        $data['subeler'] = array();        
        foreach ($result['subeler'] as $sube) {
            $data['subeler'][$sube->id] = $sube;
        } 
        
        $result['sube_duyuru'] = $subeDuyuru->list();
        foreach($result['sube_duyuru'] as $sd) {
            $data['sube_duyuru'][$sd->duyuru_id][$sd->sube_id]/**/ = $sd;
        }

        foreach($data['duyurular'] as $duyuru) { 

            if(isset($data['sube_duyuru'][$duyuru->id])) {
                
                $subeler = '';
                foreach ($data['sube_duyuru'][$duyuru->id] as $sd) {
                    $subeler .=  $data['subeler'][$sd->sube_id]->isim . ", ";
                }
                $subeler = rtrim($subeler, ', ');
                $data['sube'][$duyuru->id] = $subeler;
            }
        }

        $template = new Template('admin');
        $template->view('admin/duyuru', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Duyuru Ekle';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $duyuru = new Duyuru($dbc);
            $duyuru->setValues($_POST);
            $duyuru->insert();            
                  
            $subeDuyuru = new SubeDuyuru($dbc);
            foreach($_POST['sube_id'] as $sube_id) {
                $subeDuyuru->setValues([
                    'sube_id' => $sube_id, 
                    'duyuru_id' => $duyuru->id]);
                $subeDuyuru->insert(); 
            }            

            //$this->defaultAction();
            header("Location: index.php?section=duyuru&action=default");
            
        }
        elseif(isset($_POST['iptal'])) {

            header("Location: index.php?section=duyuru&action=default");
        }
        else {
            $data['duyuru'] = new Duyuru();

            $sube = new Sube($dbc);
            $data['subeler'] = $sube->list();

            $template = new Template('admin');
            $template->view('admin/duyuru-duzenle', $data);
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Duyuru Düzenle';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $duyuru = new Duyuru($dbc);
            $duyuru->setValues($_POST);
            $duyuru->update();

            $subeDuyuru = new SubeDuyuru($dbc);
            $subeDuyurular = $subeDuyuru->list('duyuru_id', $duyuru->id);

            $degistiMi = false;
            $eskiSubeId = array();

            foreach($subeDuyurular as $sd) { 
                $eskiSubeId[] = $sd->sube_id;
            }

            if(isset($_POST['sube_id'])) {
                $degistiMi = (count($_POST['sube_id']) > count($eskiSubeId)) ? array_diff($_POST['sube_id'], $eskiSubeId) : array_diff($eskiSubeId, $_POST['sube_id']);
            } 
            else if(isset($subeDuyurular)) {
                $subeDuyuru->deleteBy('duyuru_id', $duyuru->id);
            }
            
            if($degistiMi) {
                $subeDuyuru->deleteBy('duyuru_id', $duyuru->id);
                foreach($_POST['sube_id'] as $sube_id) {
                    $subeDuyuru->setValues([
                        'sube_id' => $sube_id, 
                        'duyuru_id' => $duyuru->id]);
                    $subeDuyuru->insert(); 
                }
            }

            //$this->defaultAction();            
            header("Location: index.php?section=duyuru&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            //$this->defaultAction();
            header("Location: index.php?section=duyuru&action=default");
        }
        else {

            $duyuru = new Duyuru($dbc);
            $data['duyuru'] = $duyuru->findBy('id', $_GET['id']); 

            $sube = new Sube($dbc);
            $data['subeler'] = $sube->list(); 

            $subeDuyuru = new SubeDuyuru($dbc);
            $result['subeDuyuru'] = $subeDuyuru->list('duyuru_id', $_GET['id']);
            foreach($result['subeDuyuru'] as $sd) {
                $data['subeDuyuru'][$sd->sube_id] = $sd;
            }

            $template = new Template('admin');
            $template->view('admin/duyuru-duzenle', $data);
        }
    }

    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $duyuru = new Duyuru($dbc);
        $duyuru->findBy('id', $_GET['id']);
        $duyuru->delete();

        header("Location: index.php?section=duyuru&action=default");
    }
}