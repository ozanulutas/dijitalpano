<?php

class LoginController extends Controller {


    public function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        
        $template = new Template('login');
        $template->view('home/login', $data);
    }
    

    /*
    // ESKİ
    public function loginAction() {

        if($_POST) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $data = array();

            $kullanici = new Kullanici($dbc);
            $data['kullanici'] = $kullanici->findUser($_POST['k_adi'], $_POST['sifre']);
            
            if($data['kullanici']) {
                // $_SESSION['k_adi'] = $data['kullanici']->k_adi;
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
    */

    // YENİ
    /**/
    public function loginAction() {
        
        if($_POST) {

            $data = array();

            $auth = new Auth();
            
            if($k_id = $auth->checkLogin($_POST['k_adi'], $_POST['sifre'])) {

                $_SESSION['k_id'] = $k_id;
                
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