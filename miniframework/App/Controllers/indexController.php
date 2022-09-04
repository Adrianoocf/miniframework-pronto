<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    use App\Models\Produto;
    use App\Models\Info;

    class IndexController extends Action 
    {
        public function index()
        {
            // $this->view->dados = ['Cama','Sofa','Mesa'];

            // instancia de conexao e modelo
            
            $produto = Container::getModel('Produto');
            $produto = $produto->getProduto();
            $this->view->dados = $produto;
            $this->render('index','layout2');
        }

        public function sobreNos()
        {
            // $this->view->dados = ['Celular','Tv','Mouse'];
            $info = Container::getModel('Info');
            $info = $info->getInfo();
            $this->view->dados = $info;
            $this->render('sobreNos','layout1');
        }
    }


?>