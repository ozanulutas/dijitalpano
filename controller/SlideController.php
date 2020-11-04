<?php

class SlideController extends Controller {

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
        $data['baslik'] = 'Slidelar';

        $slide = new Slide($dbc);
        $resim = new Resim($dbc);

        $data['slidelar'] = $slide->list();
        $result['resimler'] = $resim->list();

        foreach($result['resimler'] as $resim) {
            $data['resimler'][$resim->id] = $resim;
        }

        $template = new Template('admin');
        $template->view('admin/slide', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Slide Ekle';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $slide = new Slide($dbc);
            $slide->setValues($_POST);
            $slide->insert();
            
            header("Location: index.php?section=slide&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=slide&action=default");
        }
        else {
            $data['slide'] = new Slide();
            $resim = new Resim($dbc);
            $data['resimler'] = $resim->list();

            $template = new Template('admin');
            $template->view('admin/slide-duzenle', $data);
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Slide Düzenle';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $slide = new Slide($dbc);
            $slide->setValues($_POST);
            $slide->update();
         
            header("Location: index.php?section=slide&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=slide&action=default");
        }
        else {

            $slide = new Slide($dbc);
            $resim = new Resim($dbc);
            $data['resimler'] = $resim->list();
            $data['slide'] = $slide->findBy('id', $_GET['id']); 

            $template = new Template('admin');
            $template->view('admin/slide-duzenle', $data);
        }
    }


    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $slide = new Slide($dbc);
        $slide->findBy('id', $_GET['id']);
        $slide->delete();

        header("Location: index.php?section=slide&action=default");
    }
}