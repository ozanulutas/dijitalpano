<?php

class CssController extends Controller {


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
        $data['baslik'] = 'Renk Ayarları';

        $sube = new Sube($dbc);
        $data['subeler'] = $sube->list();


        $template = new Template('admin');
        $template->view('admin/tema', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        if(isset($_POST['sube_id'])) {

            $css = new Css($dbc);
            $css->findBy('sube_id', $_POST['sube_id']);

            if(empty($css->id)) {
                
                for($i = 0; $i < count($_POST['css_name']); $i++) {
                    $values = [
                        'name' => $_POST['css_name'][$i]['value'],
                        'value' => $_POST['css_value'][$i]['value'],
                        'sube_id' => $_POST['sube_id']
                    ];
                    
                    $css->setValues($values);
                    $css->insert();
                }
            }
            echo 'Tema renkleri deiştirildi.';
        }
    }


    public function editAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();

        if(isset($_POST['sube_id'])) {

            $css = new Css($dbc);
            $css->findBy('sube_id', $_POST['sube_id']);

            if(!empty($css->id)) {
                
                for($i = 0; $i < count($_POST['css_id']); $i++) {
                    $values = [
                        'id' => $_POST['css_id'][$i]['value'],
                        'name' => $_POST['css_name'][$i]['value'],
                        'value' => $_POST['css_value'][$i]['value'],
                        'sube_id' => $_POST['sube_id']
                    ];
                    
                    $css->setValues($values);
                    $css->update();

                }
            }
            echo 'Tema renkleri deiştirildi.';
        }
    }


    public function showAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $css = new Css($dbc);
        $data['css'] = $css->list('sube_id', $_POST['sube_id'], ['name']);

        $data['action'] = (empty($data['css'])) ? 'create' : 'edit';

        echo json_encode($data);
    }
}