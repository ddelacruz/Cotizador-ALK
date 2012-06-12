<?php

class ClientesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title = 'Lista de Clientes';
        $cliente = new Default_Model_TbClientes();
        $this->view->lista = $cliente->listarClientes();
        
    }

    public function nuevoAction()
    {
        $this->view->title = 'Nuevo Cliente';
        $form = new Default_Form_ClientesForm();
        $this->view->form = $form;
        $cliente = new Default_Model_TbClientes();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_getAllParams())){
                $cliente->guardarCliente($form->getValues());
                $this->_redirect('/clientes');
            }
        }
    }

    public function editarAction()
    {
        if(!$this->_getParam('id')){
            return $this->_redirect('/clientes');
        }
        $this->view->title = 'Editando Cliente';
        $form = new Default_Form_ClientesForm();
        $this->view->form = $form;
        $cliente = new Default_Model_TbClientes();
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_getAllParams())){
                $id = $this->_getParam('id');
                $cliente->guardarCliente($form->getValues(), $id);
                $this->_redirect('/clientes');
            }
        }else{
            $id= $this->_getParam('id');
            $row = $cliente->getRowCliente($id)->toArray();
            if($row){
                $form->populate($row);
            }
        }
    }

    public function eliminarAction()
    {
        $id= $this->_getParam('id');
        $cliente = new Default_Model_TbClientes();
        $row = $cliente->getRowCliente($id);
        
        if($row){
            $row->delete();
        }
        
        $this->_redirect('clientes');
    }

    public function verAction()
    {
        // action body
    }


}









