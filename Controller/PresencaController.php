<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Presenca.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'buscarSalaAluneJustifica':
            $id = $_POST['sala'];
            header('Location: ../alune/justificarAlunePresenca.php?sala='.$id);
        break;
        case 'buscarPresencaAlune':
            $presenca = new Presenca();
            $presenca->cod_alune = $_POST['alune'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->data = $_POST['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../alune/justificarAlunePresenca.php?sala='.$_POST['sala'].'&alune='.$_POST['alune'].'&data='.$_POST['data'].'&aula='.$_POST['aula'].'&presente='.$presente[0]['presente']);
        break;
        case 'justificarPresencaAlune':
            $presenca = new Presenca();
            $presenca->cod_alune = $_POST['alune'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->data =  $_POST['data'];
            $presenca->presente =  $_POST['presente'];
            $presenca->justificarPresenca();
            header('Location: ../alune/justificarAlunePresenca.php');
        break;

        case 'buscarPresencaTutore':
            $presenca = new Presenca();
            $presenca->cod_tutore = $_POST['tutore'];
            $presenca->data = $_POST['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../tutore/justificarTutorePresenca.php?tutore='.$_POST['tutore'].'&data='.$_POST['data'].'&presente='.$presente[0]['presente']);
        break;
        case 'justificarPresencaTutore':
            $presenca = new Presenca();
            $presenca->cod_tutore = $_POST['tutore'];
            $presenca->data =  $_POST['data'];
            $presenca->presente =  $_POST['presente'];
            $presenca->justificarPresenca();
            header('Location: ../tutore/justificarTutorePresenca.php');
        break;

        case 'buscarSalaAlune':
            $id = $_POST['sala'];
            header('Location: ../presenca/presenAlune.php?sala='.$id);
        break;
        case 'criarPresencaAlune':
            $AluneController = new AluneController();
            $alunes = $AluneController->getAlunesSala($_POST['sala']);
            $presente = isset($_POST['presente']) ? $_POST['presente'] : [] ;
            $erroAlune = 0;
            foreach($alunes as $alune){
                if(in_array($alune['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
                    $presenca->cod_sala = $_POST['sala'];
                    $presenca->aula = $_POST['aula'];
                    $presenca->presente = 'S';
                    $presenca->data = $_POST['data'];
                    $verificarPresenca = $presenca->verificarPresenca();
                    if(count($verificarPresenca) > 0){
                        $erroAlune++;
                    }else{
                        $presenca->criarPresenca(); 
                    }
                }else{
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
                    $presenca->cod_sala = $_POST['sala'];
                    $presenca->aula = $_POST['aula'];
                    $presenca->presente = 'N';
                    $presenca->data = $_POST['data'];
                    $verificarPresenca = $presenca->verificarPresenca();
                    if(count($verificarPresenca) > 0){
                        $erroAlune++;
                    }else{
                        $presenca->criarPresenca(); 
                    }
                }
            }
            if($erroAlune > 0){
                header('Location: ../presenca/presenAlune.php?sucess=false');
            }else{
                header('Location: ../presenca/presenAlune.php?sucess=true');
            }
        break;

        case 'criarPresencaTutore':
            $presenca = new Presenca();
            $presenca->cod_tutore = $_POST['tutore'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->aula = $_POST['aula'];
            $presenca->presente = 'S';
            $presenca->data = $_POST['data'];
            $verificarPresenca = $presenca->verificarPresenca();
            if(count($verificarPresenca) > 0){
                header('Location: ../presenca/presenTutore.php?sucess=false');
            }else{
                $presenca->criarPresenca();
                header('Location: ../presenca/presenTutore.php?sucess=true');
            }
        break;

        case 'criarPresencaMonitore':
            $presenca = new Presenca();
            $presenca->cod_monitore = $_POST['monitore'];
            $presenca->cod_sala = $_POST['sala'];
            $presenca->presente = 'S';
            $presenca->data = $_POST['data'];
            $verificarPresenca = $presenca->verificarPresenca();
            if(count($verificarPresenca) > 0){
                header('Location: ../presenca/presenMonitore.php?sucess=false');
            }else{
                $presenca->criarPresenca();
                header('Location: ../presenca/presenMonitore.php?sucess=true');
            }
        break;

        case 'criarPresencaReuniao':
            $TutoreController = new TutoreController();
            $tutores = $TutoreController->getTutores();
            $presente = isset($_POST['presente']) ? $_POST['presente'] : [] ;
            $erroTutore = 0;
            foreach($tutores as $tutore){
                if(in_array($tutore['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_tutore = $tutore['id'];
                    $presenca->presente = 'S';
                    $presenca->data = $_POST['data'];
                    $verificarPresenca = $presenca->verificarPresenca();
                    if(count($verificarPresenca) > 0){
                        $erroTutore++;
                    }else{
                        $presenca->criarPresenca(); 
                    }
                }else{
                    $presenca = new Presenca();
                    $presenca->cod_tutore = $tutore['id'];
                    $presenca->presente = 'N';
                    $presenca->data = $_POST['data'];
                    $verificarPresenca = $presenca->verificarPresenca();
                    if(count($verificarPresenca) > 0){
                        $erroTutore++;
                    }else{
                        $presenca->criarPresenca(); 
                    }
                }
            }
            if($erroTutore > 0){
                header('Location: ../presenca/presenReuniao.php?sucess=false');
            }else{
                header('Location: ../presenca/presenReuniao.php?sucess=true');
            }
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