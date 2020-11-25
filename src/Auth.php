<?php

class Auth {


    function checkLogin($username, $password) {
        
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $kullanici = new Kullanici($dbc);
        $kullanici->findBy('k_adi', $username);

        if(property_exists($kullanici, 'id')) {
            if(password_verify($password, $kullanici->sifre)) {
                return $kullanici->id;
            }
        }
    }
}