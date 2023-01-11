<?php
    include_once('../Model/Representante.php');

    class RepresentanteController{
        function getRepresentantes(){
            $representantes = new Representante();
            return $representantes->getRepresentantes();
        }

        function getRepresentante($id){
            $representante = new Representante();
            return $representante->getRepresentante($id);
        }

        function criarRepresentante($post, $files){
            $representante = new Representante();
            $representante->nome = $post['nome'];
            $representante->usuario = $post['usuario'];
            $representante->senha = $post['senha'];
            $id = $representante->criarRepresentante();
            if(isset($files)){
                move_uploaded_file($files['assinatura']['tmp_name'], '../Public/assinatura/'.$id.'.png');
            }
            header('Location: ../RepresentanteCadastro.php?sucess=true');
        }

        function buscarRepresentante($post){
            $id = $post['representante'];
            header('Location: ../RepresentanteEditar.php?representante='.$id);
        }

        function salvarRepresentante($post, $files){
            $representante = new Representante();
            $representante->nome = $post['nome'];
            $representante->usuario = $post['usuario'];
            $representante->senha = $post['senha'];
            $representante->salvarRepresentante($post['id']);
            if(isset($files)){
                move_uploaded_file($files['assinatura']['tmp_name'], '../Public/assinatura/'.$post['id'].'.png');
            }
            header('Location: ../RepresentanteEditar.php?sucess=true');
        }

        function excluirRepresentante($post){
            $representante = new Representante();
            $representante->id = $post['id'];
            $representante->excluir();
            header('Location: ../RepresentanteEditar.php?delete=true');
        }
    }
?>