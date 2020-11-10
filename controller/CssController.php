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
        $data['action'] = 'create';

        if(isset($_POST['kaydet'])) {

            $css = new Css($dbc);
            $css->findBy('sube_id', $_POST['sube_id']);

            if(empty($css->id)) {
                
                for($i = 0; $i < count($_POST['name']); $i++) {
                    $values = [
                        'name' => $_POST['name'][$i],
                        'value' => $_POST['value'][$i],
                        'sube_id' => $_POST['sube_id']
                    ];
                    
                    $css->setValues($values);
                    $css->insert();
                }
            }


            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            // header("Location: index.php?section=css&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=css&action=default");
        }
        else {
            $data['css'] = new Css();

            $template = new Template('admin');
            $template->view('admin/css-duzenle', $data);
        }
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
         
            header("Location: index.php?section=sube&action=default");
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=sube&action=default");
        }
        else {

            $sube = new Sube($dbc);
            $data['sube'] = $sube->findBy('id', $_GET['id']); 

            $template = new Template('admin');
            $template->view('admin/sube-duzenle', $data);
        }
    }


    public function showAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $css = new Css($dbc);
        $data['css'] = $css->list('sube_id', $_POST['sube_id'], ['name']);

        // foreach($result['css'] as $css) {
        //     // $data['css'][$css->name] = $css;
        //     $data['css'][] = $css;
        // }

        echo json_encode($data);
    }
}