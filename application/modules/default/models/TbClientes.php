<?php

class Default_Model_TbClientes extends Zend_Db_Table_Abstract
{
    protected $_name = 'cliente';
    protected $_primary = 'cl_id';
    
    public function listarClientes(){
        return $this->fetchAll();
    }

    public function guardarCliente($data, $id=null){
        if(is_null($id)){
            $row = $this->createRow();
        }else{
            $row = $this->getRowCliente($id);
        }
        $row->setFromArray($data);
        
        return $row->save();
    }
    
    public function getRowCliente($id){
        $id = (int) $id;
        $row = $this->find($id)->current();
        return $row;
    }

}

