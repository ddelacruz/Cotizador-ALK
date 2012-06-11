<?php

class TelasController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title ='Lista de Telas';
    
        $telas = new Default_Model_TbTelas();
        $this->view->lista = $telas->listarTelas();
    }

    public function nuevoAction()
    {
        $this->view->title = 'Nueva Tela';
        $telas = new Default_Model_TbTelas();
        $form = new Default_Form_TelasForm();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_getAllParams())){
                $telas->guardarTelas($form->getValues());
                $this->_redirect('/telas');
            }
        }           
        
    }

    public function editarAction()
    {
        $telas = new Default_Model_TbTelas();
        if(!$this->_getParam('id')){
            return $this->_redirect('telas');
        }  
        
        $this->view->title = 'Editando Tela';
        $telas = new Default_Model_TbTelas();
        $form = new Default_Form_TelasForm();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_getAllParams())){
                $id = $this->_getParam('id');
                $telas->guardarTelas($form->getValues(),$id);
                $this->_redirect('/telas');
            }
        } else{
            $id = $this->_getParam('id');
            $row = $telas->getRowTela($id)->toArray();
            if($row){
                $form->populate($row);
            }
        }         
        
    }

    public function eliminarAction()
    {
        // action body
    }

    public function verAction()
    {
        // action body
    }


}









