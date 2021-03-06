<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ProgramController extends Controller {


    private $gunler = [
        'Pazartesi' => 0,
        'Salı' => 1,
        'Çarşamba' => 2,
        'Perşembe' => 3,
        'Cuma' => 4,
        'Cumartesi' => 5,
        'Pazar' => 6
    ];


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

        $sube = new Sube($dbc);        
        $data['subeler'] = $sube->list();

        $template = new Template('admin');
        $template->view('admin/program', $data);
    }


    public function createAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $data = array();
        $data['baslik'] = 'Etkinlik Oluştur';
        $data['action'] = 'create';

        if(isset($_POST['formData'])){
            $program = new Program($dbc);
            $program->setValues($_POST);

            $values = array();
            parse_str($_POST['formData'], $values);
            
            if($values['etkinlik'] && $values['saat'] && $values['bitis_saat']) {
                $program = new Program($dbc);
                $program->setValues($values);
                $program->insert();
                echo json_encode($program);
            } else {
                echo json_encode('error');
            }
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=program");
        }
        else {
            $data['program'] = new Program();
            $sube = new Sube($dbc);

            $data['subeler'] = $sube->list();
            $data['sube_id'] = $_GET['sube_id'] ?? '';

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
         
            header("Location: index.php?section=program&sube_id=" . $program->sube_id);
        }
        elseif(isset($_POST['iptal'])) {
            header("Location: index.php?section=program");
        }
        elseif(isset($_GET['id'])) {
            $program = new Program($dbc);
            $sube = new Sube($dbc);

            $data['subeler'] = $sube->list(); 
            $data['program'] = $program->findBy('id', $_GET['id']); 
            $data['program']->saat = $this->formatTime($program->saat);
            $data['program']->bitis_saat = $this->formatTime($program->bitis_saat);

            $template = new Template('admin');
            $template->view('admin/program-duzenle', $data);
        }
        else
            header("Location: index.php?section=program");
    }


    public function deleteAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $program = new Program($dbc);

        if(isset($_POST['topluSil'])) {
            $program->deleteBy('sube_id', $_POST['sube_id']);
        }
        elseif(isset($_GET['id'])) {
            $program->findBy('id', $_GET['id']);
            $program->delete();
        }

        header("Location: index.php?section=program&sube_id=" . $program->sube_id);
    }


    public function showAction() {

        if($_POST['sube_id']) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $data = array();
            $program = new Program($dbc);
            $result['programlar'] = $program->list('sube_id', $_POST['sube_id'], ['gun', 'saat']);
            foreach($result['programlar'] as $program) {
                $data['programlar'][$program->gun][] = $program;
            }

            echo json_encode($data);
        }    
        else
            header("Location: index.php?section=program");
    }


    public function importAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        if(isset($_POST['import'])) {

            $upload = new Upload('sheet', SHEET_DIR);

            if($yol = $upload->uploadFile()) {

                $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($yol);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType);
                $spreadSheet = $reader->load($yol);
                unlink($yol);
                $data['sheet'] = $spreadSheet->getActiveSheet()->toArray();
                array_shift($data['sheet']);

                $program = new Program($dbc);

                $gunler = [
                    'Pazartesi' => 0,
                    'Salı' => 1,
                    'Çarşamba' => 2,
                    'Perşembe' => 3,
                    'Cuma' => 4,
                    'Cumartesi' => 5,
                    'Pazar' => 6
                ];

                for($i = 0, $j = 0; $i < 7; $i++, $j += 5) {            
                    foreach($data['sheet'] as $row) {
                        $k = 0;
                        if(!empty($row[$k])) {                    
                            $values = array(
                                'gun'  => $gunler[$row[0 + $j]] ?? null,
                                'saat'  => $row[1 + $j] ?? null,
                                'bitis_saat'  => $row[2 + $j] ?? null,
                                'etkinlik'  => $row[3 + $j] ?? null,
                                'sube_id'  => $_POST['sube_id'] ?? null
                            );
                            
                            $program->setValues($values);
                            $program->insert();
                        }
                        $k++;
                    }
                }
                echo "Dosya başarıyla içe aktarıldı.";
            }
        }        
        else
            header("Location: index.php?section=program");
    }


    public function gDriveImportAction() {

        if(isset($_POST['gDriveImport'])) {

            $client = new \Google_Client();
            $client->setApplicationName('Google Drive Spread Sheets'); // herhangi bir isim
            $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
            $client->setAccessType('offline');
            $client->setAuthConfig(ROOT_PATH . 'vendor/credentials.json'); // indirdiğimiz kimlik bilileri
            $service = new Google_Service_Sheets($client);
            $spreadsheetId = $_POST['sheetId']; // drive'daki excel id

            try {
                $range = 'A2:AH'; 
                $response = $service->spreadsheets_values->get($spreadsheetId, $range);            
                
                $values = $response->getValues();
    
                if(empty($values)) {
                    echo "Tablo boş.";
                } 
                else {      
                    $dbh = DatabaseConnection::getInstance();
                    $dbc = $dbh->getConnection();
                    $program = new Program($dbc);

                    $gunler = [
                        'Pazartesi' => 0,
                        'Salı' => 1,
                        'Çarşamba' => 2,
                        'Perşembe' => 3,
                        'Cuma' => 4,
                        'Cumartesi' => 5,
                        'Pazar' => 6
                    ];

                    for($i = 0, $j = 0; $i < 7; $i++, $j += 5) {    
                        foreach($values as $row)
                        {
                            $k = 0;
                            if(!empty($row[$k])) {
                                $params = array(
                                    'gun'  => $this->gunler[$row[0 + $j]] ?? null,
                                    'saat'  => $row[1 + $j] ?? null,
                                    'bitis_saat'  => $row[2 + $j] ?? null,
                                    'etkinlik'  => $row[3 + $j] ?? null,
                                    'sube_id'  => $_POST['sube_id'] ?? null
                                );
                                
                                $program->setValues($params);
                                $program->insert();
                            }
                            $k++;
                        }
                    }   
                    echo "Dosya başarıyla içe aktarıldı."; 
                }
            } catch(Exception $e) {
                die(header("HTTP/1.0 404 Not Found"));
            }
        }
        else
            header("Location: index.php?section=program");
    }


    public function exportAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        if(isset($_POST["export"])) {

            $program = new Program($dbc);
            $result['programlar'] = $program->list('sube_id', $_POST['sube_id'], ['gun', 'saat']);

            $file = new Spreadsheet();            
            $active_sheet = $file->getActiveSheet();
            
            $sut = 'A';
            $alanlar = ['GÜN', 'SAAT', 'ARALIĞI', 'PROGRAM', ''];
            
            for ($i = 0; $i < 7 ; $i++) { 
                for ($j = 0; $j < 5; $j++) { 
                    $active_sheet->setCellValue($sut . '1', $alanlar[$j]);
                    $sut++;
                }
            }

            $ilkSut = 'A';
            $gun = 0;
            $count = 2;
            
            foreach($result['programlar'] as $program) {
                
                if($gun != $program->gun) {
                    $gun++;
                    $count = 2;
                    for ($i = 0; $i < 5; $i++) {
                        $ilkSut++;
                    }  
                } 
                
                $sut = $ilkSut;
                $active_sheet->setCellValue($sut . $count, GUNLER[$program->gun]);
                $active_sheet->setCellValue(++$sut . $count, $program->saat);
                $active_sheet->setCellValue(++$sut . $count, $program->bitis_saat);
                $active_sheet->setCellValue(++$sut . $count, $program->etkinlik);
                $count++;
            }    
            
            $file_name = time() . '.' . strtolower($_POST["file_type"]);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-disposition: attachment; filename=\"".$file_name."\"");
            header('Cache-Control: max-age=0');          
          
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);
            $writer->save('php://output');
          
            readfile($file_name);
            unlink($file_name);
            
            exit;
        }
        else
            header("Location: index.php?section=program");
    }

}