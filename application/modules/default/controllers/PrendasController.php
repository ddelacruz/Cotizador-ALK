<?php

class PrendasController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title = 'Lista de Prendas';
        $prenda = new Default_Model_TbPrendas();
        $this->view->lista = $prenda->listarPrendas();
    }

    public function nuevoAction()
    {
        $this->view->title = 'Nueva Prenda';
        $form = new Default_Form_PrendasForm();
        $prenda = new Default_Model_TbPrendas();
        
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_getAllParams())){
                $prenda->guardarPrenda($form->getValues());
                $this->_redirect('/prendas');
            }
        }
    }


}



