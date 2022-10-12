<?php
    include_once('AluneController.php');
    include_once('ComissaoController.php');
    include_once('DisciplinaController.php');
    include_once('LoginController.php');
    include_once('MonitoreController.php');
    include_once('PresencaController.php');
    include_once('RepresentanteController.php');
    include_once('SalaController.php');
    include_once('TutoreController.php');

    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 
    switch($metodo){
        case 'criarAlune':
            $AluneController = new AluneController();
            echo $AluneController->criarAlune($_POST);
            break;
        case 'getAlunes':
            $AluneController = new AluneController();
            echo $AluneController->getAlunes($_POST);
            break;
        case 'getAlune':
            $AluneController = new AluneController();
            echo $AluneController->getAlune($_POST);
            break;
        case 'getAlunesSala':
            $AluneController = new AluneController();
            echo $AluneController->getAlunesSala($_POST);
            break;
        case 'salvarAlune':
            $AluneController = new AluneController();
            echo $AluneController->salvarAlune($_POST);
            break;
        case 'excluirAlune':
            $AluneController = new AluneController();
            echo $AluneController->excluirAlune($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'getComissoes':
            $ComissaoController = new ComissaoController();
            echo $ComissaoController->getComissoes($_POST);
            break; 
        case 'getComissao':
            $ComissaoController = new ComissaoController();
            echo $ComissaoController->getComissao($_POST);
            break;
        case 'criarComissao':
            $ComissaoController = new ComissaoController();
            echo $ComissaoController->criarComissao($_POST);
            break;
        case 'salvarComissao':
            $ComissaoController = new ComissaoController();
            echo $ComissaoController->salvarComissao($_POST);
            break;
        case 'excluirComissao':
            $ComissaoController = new ComissaoController();
            echo $ComissaoController->excluirComissao($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarDisciplina':
            $DisciplinaController = new DisciplinaController();
            echo $DisciplinaController->criarDisciplina($_POST);
            break;
        case 'getDisciplina':
            $DisciplinaController = new DisciplinaController();
            echo $DisciplinaController->getDisciplina($_POST);
            break;
        case 'getDisciplinas':
            $DisciplinaController = new DisciplinaController();
            echo $DisciplinaController->getDisciplinas($_POST);
            break;
        case 'salvarDisciplina':
            $DisciplinaController = new DisciplinaController();
            echo $DisciplinaController->salvarDisciplina($_POST);
            break;
        case 'excluirDisciplina':
            $DisciplinaController = new DisciplinaController();
            echo $DisciplinaController->excluirDisciplina($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'verificaLogin':
            $LoginController = new LoginController();
            echo $LoginController->verificaLogin($_POST);
            break;
        case 'login':
            $LoginController = new LoginController();
            echo $LoginController->login($_POST);
            break;
        case 'logout':
            $LoginController = new LoginController();
            echo $LoginController->logout($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarMonitore':
            $MonitoreController = new MonitoreController();
            echo $MonitoreController->criarMonitore($_POST);
            break;
        case 'getMonitores':
            $MonitoreController = new MonitoreController();
            echo $MonitoreController->getMonitores($_POST);
            break; 
        case 'getMonitore':
            $MonitoreController = new MonitoreController();
            echo $MonitoreController->getMonitore($_POST);
            break;
        case 'salvarMonitore':
            $MonitoreController = new MonitoreController();
            echo $MonitoreController->salvarMonitore($_POST);
            break;
        case 'excluirMonitore':
            $MonitoreController = new MonitoreController();
            echo $MonitoreController->excluirMonitore($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'buscarPresencaAlune':
            $PresencaController = new PresencaController();
            echo $PresencaController->buscarPresencaAlune($_POST);
            break;
        case 'justificarPresencaAlune':
            $PresencaController = new PresencaController();
            echo $PresencaController->justificarPresencaAlune($_POST);
            break;
        case 'buscarPresencaReuniao':
            $PresencaController = new PresencaController();
            echo $PresencaController->buscarPresencaReuniao($_POST);
            break;
        case 'justificarPresencaReuniao':
            $PresencaController = new PresencaController();
            echo $PresencaController->justificarPresencaReuniao($_POST);
            break;
        case 'buscarPresencaMonitore':
            $PresencaController = new PresencaController();
            echo $PresencaController->buscarPresencaMonitore($_POST);
            break;
        case 'editarPresencaMonitore':
            $PresencaController = new PresencaController();
            echo $PresencaController->editarPresencaMonitore($_POST);
            break;
        case 'buscarPresencaTutore':
            $PresencaController = new PresencaController();
            echo $PresencaController->buscarPresencaTutore($_POST);
            break;
        case 'editarPresencaTutore':
            $PresencaController = new PresencaController();
            echo $PresencaController->editarPresencaTutore($_POST);
            break;
        case 'buscarSalaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->buscarSalaAlune($_POST);
            break;
        case 'criarPresencaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaAlune($_POST);
            break;
        case 'criarPresencaTutore':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaTutore($_POST);
            break;
        case 'criarPresencaMonitore':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaMonitore($_POST);
            break;

        case 'criarPresencaReuniao':
            $PresencaController = new PresencaController();
            $PresencaController->criarPresencaReuniao($_POST);
            break;    
        case 'relatorioPresencaAlune':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaAlune($_POST);
            break; 
        case 'relatorioPresencaReuniao':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaReuniao($_POST);
            break; 
        case 'relatorioPresencaMonitore':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaMonitore($_POST);
            break; 
        case 'relatorioPresencaTutore':
            $PresencaController = new PresencaController();
            $PresencaController->relatorioPresencaTutore($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'certificadoTutore':
            $PresencaController = new PresencaController();
            $PresencaController->certificadoTutore($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'getRepresentantes':
            $RepresentanteController = new RepresentanteController();
            echo $RepresentanteController->getRepresentantes($_POST);
            break; 
        case 'criarRepresentante':
            $RepresentanteController = new RepresentanteController();
            echo $RepresentanteController->criarRepresentante($_POST, $_FILES);
            break; 
        case 'getRepresentante':
            $RepresentanteController = new RepresentanteController();
            echo $RepresentanteController->getRepresentante($_POST);
            break; 
        case 'salvarRepresentante':
            $RepresentanteController = new RepresentanteController();
            echo $RepresentanteController->salvarRepresentante($_POST, $_FILES);
            break; 
        case 'excluirRepresentante':
            $RepresentanteController = new RepresentanteController();
            echo $RepresentanteController->excluirRepresentante($_POST);
            break; 
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarSala':
            $SalaController = new SalaController();
            echo $SalaController->criarSala($_POST);
            break;
        case 'getSala':
            $SalaController = new SalaController();
            echo $SalaController->getSala($_POST);
            break;
        case 'getSalas':
            $SalaController = new SalaController();
            echo $SalaController->getSalas($_POST);
            break;
        case 'salvarSala':
            $SalaController = new SalaController();
            echo $SalaController->salvarSala($_POST);
            break;
        case 'excluirSala':
            $SalaController = new SalaController();
            echo $SalaController->excluirSala($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'criarTutore':
            $TutoreController = new TutoreController();
            echo $TutoreController->criarTutore($_POST);
            break;
        case 'getTutore':
            $TutoreController = new TutoreController();
            echo $TutoreController->getTutore($_POST);
            break;
        case 'getTutores':
            $TutoreController = new TutoreController();
            echo $TutoreController->getTutores($_POST);
            break;
        case 'salvarTutore':
            $TutoreController = new TutoreController();
            echo $TutoreController->salvarTutore($_POST);
            break;
        case 'excluirTutore':
            $TutoreController = new TutoreController();
            echo$TutoreController->excluirTutore($_POST);
            break;
        ///////////////////////////////////////////////////////////////////////////////
        default:
            echo "Método não encontrado";
    }
?>