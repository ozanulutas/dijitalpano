<?php

class Controller {

    public function runAction($actionName) {

        if(method_exists($this, 'runBeforeAction')) {
            $result = $this->runBeforeAction();
            if($result == false) {
                return;
            }
        }

        $actionName .= 'Action';
        if(method_exists($this, $actionName)) {
            $this->$actionName();
        }
        else {
            include 'view/status/404.html';
        }
    }


    protected function formatTime($time) {
        return substr($time, 0, 5);
    }

    protected function degistiMi($tabloAdi, $degistuMu) {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $degistiMi = new DegistiMi($dbc);
        $degistiMi->findBy('tablo_adi', $tabloAdi);
        $degistiMi->degisti_mi = $degistuMu;
        $degistiMi->update();

        return $degistiMi;
    }


}
