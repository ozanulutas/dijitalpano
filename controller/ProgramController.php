<?php

class ProgramController extends Controller {


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
        $data['baslik'] = 'Programlar';

        $program = new Program($dbc);
        $sube = new Sube($dbc);

        // $data['programlar'] = $program->list();
        $data['subeler'] = $sube->list();

        $data['programlar'] = $program->list('sube_id', 1);


        $template = new Template('admin');
        $template->view('admin/program', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Etkinlik Oluştur';
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $program = new Program($dbc);
            $program->setValues($_POST);
            $program->insert();

            // $data['sube_id'] = $_POST['sube_id'];
            // $_POST['sube_id'] = $program->sube_id;
            // echo "<pre>";
            // print_r($program);
            // echo "</pre>";
            header("Location: index.php?section=program&action=create");

        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=program&action=default");
        }
        else {
            $data['program'] = new Program();
            $sube = new Sube($dbc);

            $data['subeler'] = $sube->list();
            $data['sube_id'] = $_POST['sube_id'];


            $template = new Template('admin');
            $template->view('admin/program-duzenle', $data);
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Etkinlik Düzenle';
        $data['action'] = 'edit';

        if(isset($_POST['kaydet'])) {

            $program = new Program($dbc);
            $program->setValues($_POST);
            $program->update();
         
            header("Location: index.php?section=program&action=default&sube_id=" . $program->sube_id);
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=program&action=default");
        }
        else {

            $program = new Program($dbc);
            $sube = new Sube($dbc);

            $data['subeler'] = $sube->list(); 
            $data['program'] = $program->findBy('id', $_GET['id']); 

            $template = new Template('admin');
            $template->view('admin/program-duzenle', $data);
        }
    }


    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $program = new Program($dbc);

        if(isset($_POST['topluSil'])) {
            $program->deleteBy('sube_id', $_POST['sube_id']);
        }
        else {
            $program->findBy('id', $_GET['id']);
            $program->delete();
        }

        header("Location: index.php?section=program&action=default&sube_id=" . $program->sube_id);
    }


    public function ajaxAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        if(isset($_POST['command'])) {

            if($_POST['command'] == 'insert') {
                
                $program = new Program($dbc);
                $program->setValues($_POST);
                $program->insert();
                echo 'Kayıt başarıyla eklendi.';

            }
            elseif($_POST['command'] == 'goster') {

                $program = new Program($dbc);
                $data['programlar'] = $program->list('sube_id', $_POST['sube_id']);
    
                echo json_encode($data);
            }
        }
    }



}