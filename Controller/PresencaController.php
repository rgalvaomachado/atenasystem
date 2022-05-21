<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Presenca.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'buscar':
            $id = $_POST['sala'];
            header('Location: ../presenca/presenAlune.php?sala='.$id);
        break;
        case 'buscarAlunePresenca':
            $id = $_POST['sala'];
            header('Location: ../alune/justificarAlunePresenca.php?sala='.$id);
        break;
        case 'buscarPresencaAlune':
            $presenca = new Presenca();
            $presenca->cod_alune = $_POST['alune'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->data = $_POST['data'];
            $presente = $presenca->buscarPresencaAlune();
            header('Location: ../alune/justificarAlunePresenca.php?sala='.$_POST['sala'].'&alune='.$_POST['alune'].'&data='.$_POST['data'].'&aula='.$_POST['aula'].'&presente='.$presente['presente']);
        break;
        case 'buscarPresencaTutore':
            $presenca = new Presenca();
            $presenca->cod_tutore = $_POST['tutore'];
            $presenca->data = $_POST['data'];
            $presente = $presenca->buscarPresencaTutore();
            header('Location: ../tutore/justificarTutorePresenca.php?tutore='.$_POST['tutore'].'&data='.$_POST['data'].'&presente='.$presente['presente']);
        break;
        case 'justificarPresencaAlune':
            $presenca = new Presenca();
            $presenca->cod_alune = $_POST['alune'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->data =  $_POST['data'];
            $presenca->presente =  $_POST['presente'];
            $presenca->justificarPresencaAlune();
            header('Location: ../alune/justificarAlunePresenca.php');
        break;
        case 'justificarPresencaTutore':
            $presenca = new Presenca();
            $presenca->cod_tutore = $_POST['tutore'];
            $presenca->data =  $_POST['data'];
            $presenca->presente =  $_POST['presente'];
            $presenca->justificarPresencaTutore();
            header('Location: ../tutore/justificarTutorePresenca.php');
        break;
        case 'criarPresencaAlune':
            $AluneController = new AluneController();
            $alunes = $AluneController->getAlunesSala($_POST['sala']);
            $presente = isset($_POST['presente']) ? $_POST['presente'] : [] ;
            foreach($alunes as $alune){
                if(in_array($alune['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
                    $presenca->cod_sala = $_POST['sala'];
                    $presenca->aula = $_POST['aula'];
                    $presenca->presente = 'S';
                    $presenca->data = $_POST['data'];
                    $presenca->presencaAlune();
                }else{
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
                    $presenca->cod_sala = $_POST['sala'];
                    $presenca->aula = $_POST['aula'];
                    $presenca->presente = 'N';
                    $presenca->data = $_POST['data'];
                    $presenca->presencaAlune();
                }
            }
            header('Location: ../presenca/presenAlune.php');
        break;
        case 'criarPresencaTutore':
            $presenca = new Presenca();
            $presenca->cod_tutore = $_POST['tutore'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->presente = 'S';
            $presenca->data = $_POST['data'];
            $presenca->presencaTutore();
            header('Location: ../presenca/presenTutore.php?presente=S');
        break;
        case 'criarPresencaMonitore':
            $presenca = new Presenca();
            $presenca->cod_monitore = $_POST['monitore'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->presente = 'S';
            $presenca->data = $_POST['data'];
            $presenca->presencaMonitore();
            header('Location: ../presenca/presenMonitore.php?presente=S');
        break;
        case 'criarPresencaReuniao':
            $TutoreController = new TutoreController();
            $tutores = $TutoreController->getTutores();
            $presente = isset($_POST['presente']) ? $_POST['presente'] : [] ;
            foreach($tutores as $tutore){
                if(in_array($tutore['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_tutore = $tutore['id'];
                    $presenca->presente = 'S';
                    $presenca->data = $_POST['data'];
                    $presenca->presencaReuniao();
                }else{
                    $presenca = new Presenca();
                    $presenca->cod_tutore = $tutore['id'];
                    $presenca->presente = 'N';
                    $presenca->data = $_POST['data'];
                    $presenca->presencaReuniao();
                }
            }
            header('Location: ../presenca/presenReuniao.php?presente=S');
        break;
        case 'relatorioPresencaAlune':
            $cod_sala = $_POST['cod_sala'];
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];
            header('Location: ../relatorio/relAlune.php?cod_sala='.$cod_sala.'&data_inicial='.$data_inicial.'&data_final='.$data_final);
        break;
        case 'relatorioPresencaReuniao':
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];
            header('Location: ../relatorio/relReuniao.php?data_inicial='.$data_inicial.'&data_final='.$data_final);
        break;
    }

    class PresencaController{
        function getPresenca(){
            $presenca = new Presenca();
            return $presenca->getPresenca();
        }

        function getPresencaPeriodo($cod_sala, $cod_alune, $cod_monitore, $cod_tutore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_sala = $cod_sala ;
            $presenca->cod_monitore = $cod_monitore ;
            $presenca->cod_tutore = $cod_tutore ;
            $presenca->cod_alune = $cod_alune ;
            $presenca->data = $data_inicial ;
            $presenca->data_final = $data_final ;
            return $presenca->getPresencaPeriodo();
        }

        function getAusenciaPeriodo($cod_sala, $cod_alune, $cod_monitore, $cod_tutore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_sala = $cod_sala ;
            $presenca->cod_monitore = $cod_monitore ;
            $presenca->cod_tutore = $cod_tutore ;
            $presenca->cod_alune = $cod_alune ;
            $presenca->data = $data_inicial ;
            $presenca->data_final = $data_final ;
            return $presenca->getAusenciaPeriodo();
        }

        function getJustificadoPeriodo($cod_sala, $cod_alune, $cod_monitore, $cod_tutore, $data_inicial, $data_final){
            $presenca = new Presenca();
            $presenca->cod_sala = $cod_sala ;
            $presenca->cod_monitore = $cod_monitore ;
            $presenca->cod_tutore = $cod_tutore ;
            $presenca->cod_alune = $cod_alune ;
            $presenca->data = $data_inicial ;
            $presenca->data_final = $data_final ;
            return $presenca->getJustificadoPeriodo();
        }
    }
?>