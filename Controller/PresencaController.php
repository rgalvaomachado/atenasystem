<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Presenca.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'buscar':
            $id = $_POST['sala'];
            header('Location: ../presenca/PresenAlune.php?sala='.$id);
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
        case 'justificarPresencaAlune':
            $presenca = new Presenca();
            $presenca->cod_alune = $_POST['alune'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->data =  $_POST['data'];
            $presenca->presente =  $_POST['presente'];
            $presenca->justificarPreencaAlune();
            header('Location: ../alune/justificarAlunePresenca.php');
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
            header('Location: ../presenca/PresenTutore.php?presente=S');
        break;
        case 'criarPresencaMonitore':
            $presenca = new Presenca();
            $presenca->cod_monitore = $_POST['monitore'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->presente = 'S';
            $presenca->data = $_POST['data'];
            $presenca->presencaMonitore();
            header('Location: ../presenca/PresenMonitore.php?presente=S');
        break;
    }

    class PresencaController{
        function getPresenca(){
            $presenca = new Presenca();
            return $presenca->getPresenca();
        }

        function getTutore($id){
            $tutore = new Tutore();
            return $tutore->getTutore($id);
        }
    }
?>