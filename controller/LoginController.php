<?php

class LoginController extends Controller {

    public function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        
        $template = new Template('login');
        $template->view('home/login', $data);
    }
    

    public function loginAction() {

        if($_POST) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $data = array();

            $kullanici = new Kullanici($dbc);
            $data['kullanici'] = $kullanici->findUser($_POST['k_adi'], $_POST['sifre']);
            
            if($data['kullanici']) {
                $_SESSION['k_id'] = $data['kullanici']->id;
                
                echo json_encode($_SESSION);
            } else {
                echo json_encode("Kullanıcı adı veya şifre hatalı");
            }
        } 
        else {
            header('Location: index.php');
        }
    }
}