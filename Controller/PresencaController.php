<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Presenca.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/AluneController.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/TutoreController.php");

    class PresencaController{
        function buscarSalaAluneJustifica($post){
            $id = $post['sala'];
            header('Location: ../alune/justificarAlunePresenca.php?sala='.$id);
        }

        function buscarPresencaAlune($post){
            $presenca = new Presenca();
            $presenca->cod_alune = $post['alune'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->data = $post['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../alune/justificarAlunePresenca.php?sala='.$post['sala'].'&alune='.$post['alune'].'&data='.$post['data'].'&aula='.$post['aula'].'&presente='.$presente[0]['presente']);
        }

        function justificarPresencaAlune($post){
            $presenca = new Presenca();
            $presenca->cod_alune = $post['alune'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->data =  $post['data'];
            $presenca->presente =  $post['presente'];
            $presenca->justificarPresenca();
            header('Location: ../alune/justificarAlunePresenca.php');
        }

        function buscarPresencaTutore($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->data = $post['data'];
            $presente = $presenca->verificarPresenca();
            header('Location: ../tutore/justificarTutorePresenca.php?tutore='.$post['tutore'].'&data='.$post['data'].'&presente='.$presente[0]['presente']);
        }

        function justificarPresencaTutore($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->data =  $post['data'];
            $presenca->presente =  $post['presente'];
            $presenca->justificarPresenca();
            header('Location: ../tutore/justificarTutorePresenca.php');
        }

        function buscarSalaAlune($post){
            $id = $post['sala'];
            header('Location: ../presenca/presenAlune.php?sala='.$id);
        }

        function criarPresencaAlune($post){
            $AluneController = new AluneController();
            $alunes = $AluneController->getAlunesSala($post['sala']);
            $presente = isset($post['presente']) ? $post['presente'] : [] ;
            $erroAlune = 0;
            foreach($alunes as $alune){
                if(in_array($alune['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
                    $presenca->cod_sala = $post['sala'];
                    $presenca->aula = $post['aula'];
                    $presenca->presente = 'S';
                    $presenca->data = $post['data'];
                    $verificarPresenca = $presenca->verificarPresenca();
                    if(count($verificarPresenca) > 0){
                        $erroAlune++;
                    }else{
                        $presenca->criarPresenca(); 
                    }
                }else{
                    $presenca = new Presenca();
                    $presenca->cod_alune = $alune['id'];
                    $presenca->cod_sala = $post['sala'];
                    $presenca->aula = $post['aula'];
                    $presenca->presente = 'N';
                    $presenca->data = $post['data'];
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
        }

        function criarPresencaTutore($post){
            $presenca = new Presenca();
            $presenca->cod_tutore = $post['tutore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->aula = $post['aula'];
            $presenca->presente = 'S';
            $presenca->data = $post['data'];
            $verificarPresenca = $presenca->verificarPresenca();
            if(count($verificarPresenca) > 0){
                header('Location: ../presenca/presenTutore.php?sucess=false');
            }else{
                $presenca->criarPresenca();
                header('Location: ../presenca/presenTutore.php?sucess=true');
            }
        }

        function criarPresencaMonitore($post){
            $presenca = new Presenca();
            $presenca->cod_monitore = $post['monitore'];
            $presenca->cod_sala = $post['sala'];
            $presenca->presente = 'S';
            $presenca->data = $post['data'];
            $verificarPresenca = $presenca->verificarPresenca();
            if(count($verificarPresenca) > 0){
                header('Location: ../presenca/presenMonitore.php?sucess=false');
            }else{
                $presenca->criarPresenca();
                header('Location: ../presenca/presenMonitore.php?sucess=true');
            }
        }

        function criarPresencaReuniao($post){
            $TutoreController = new TutoreController();
            $tutores = $TutoreController->getTutores();
            $presente = isset($post['presente']) ? $post['presente'] : [] ;
            $erroTutore = 0;
            foreach($tutores as $tutore){
                if(in_array($tutore['id'], $presente)){
                    $presenca = new Presenca();
                    $presenca->cod_tutore = $tutore['id'];
                    $presenca->presente = 'S';
                    $presenca->data = $post['data'];
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
                    $presenca->data = $post['data'];
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
        }

        function relatorioPresencaAlune($post){
            $cod_sala = $post['cod_sala'];
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            header('Location: ../relatorio/relAlune.php?cod_sala='.$cod_sala.'&data_inicial='.$data_inicial.'&data_final='.$data_final);
        }

        function relatorioPresencaReuniao($post){
            $data_inicial = $post['data_inicial'];
            $data_final = $post['data_final'];
            header('Location: ../relatorio/relReuniao.php?data_inicial='.$data_inicial.'&data_final='.$data_final);
        }

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

        function deletaPresencaAlune($cod_alune){
            $presenca = new Presenca();
            $presenca->cod_alune = $cod_alune;
            return $presenca->deletaPresencaAlune();
        }
    }
?>