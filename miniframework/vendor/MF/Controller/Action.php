<?php

    namespace MF\Controller;

    use stdClass;

    abstract class Action{

        protected $view;

        public function __construct()
        {
            $this->view = new stdClass();
                    
        }

        protected function render($view,$layout)
        {
            $this->view->page = $view;    
            if (file_exists("../App/Views/Index/".$view.".phtml"))
            {  
                if (file_exists("../App/Views/".$layout.".phtml"))
                {
                    require_once "../App/Views/".$layout.".phtml";
                }
                else
                {
                    $this->content();
                }
            }
            else
            {
                echo '<h3>Arquivo nao encontrado, tente mais tarde..<h3>';
            }
        }



        protected function content()
        {
            $classeAtual = get_class($this);
            // substitui o app\\controller\\ por espaco
            $classeAtual = str_replace('App\\Controllers\\','',$classeAtual);
            $classeAtual = strtolower(str_replace('Controller','',$classeAtual));
            require_once "../App/Views/".$classeAtual."/" .$this->view->page. ".phtml";
        }

    }


?>