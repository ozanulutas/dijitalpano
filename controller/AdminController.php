<?php

class AdminController extends Controller {

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

        $variables = array();

        // $template = new Template('admin');
        // $template->view('admin/default', $variables);

        header("Location: index.php?section=sube&action=default");

    }

    public function logoutAction() {

        unset($_SESSION['k_id']);
        header("Location: index.php");
    }
    
}