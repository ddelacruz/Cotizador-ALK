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
        $form = new Default_Form_PrendasForm();
        $this->view->form = $form;
        $this->view->titleModal = 'Nueva Prenda';

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

    public function editarAction()
    {
        $this->view->title = 'Editando Prenda';
         $form = new Default_Form_PrendasForm();
        if(!$this->_getParam('id')){
            return $this->_redirect('prendas');
        }
        $prenda = new Default_Model_TbPrendas();        
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_getAllParams())){
                $id = $this->_getParam('id');
                $prenda->guardarPrenda($form->getValues(),$id);
                $this->_redirect('/prendas');
            }
        }else{
            $id = $this->_getParam('id');
            $row = $prenda->getRowPrenda($id)->toArray();
            if($row){
                $form->populate($row);
            }
        }
    }

    public function eliminarAction()
    {
        $id = $this->_getParam('id');
        $prenda = new Default_Model_TbPrendas(); 
        $row = $prenda->getRowPrenda($id);
        if($row){
             $row->delete();
        }
        
        $this->_redirect('prendas');
    }

    public function verAction()
    {
       $id = $this->_getParam('id');
        
        $tela = new Default_Model_TbPrendas();
        $row = $tela->getRowPrenda($id);
       
        $this->view->row = $row;
        $this->view->title = $row->pr_nombre;
        $this->view->foto = $row->pr_foto;
    }


}









