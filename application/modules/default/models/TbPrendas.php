<?php

class Default_Model_TbPrendas extends Zend_Db_Table_Abstract
{
    protected $_name = 'prendas';
    protected $_primary = 'pr_id';
    
    public function listarPrendas(){
        return $this->fetchAll();
    }
    
    public function guardarPrenda($data, $id=null){
        
        if(is_null($id)){
            $row = $this->createRow();
        }else{
            $row = $this->getRowPrenda($id);
        }
        $row->setFromArray($data);
        return $row->save();
    }

    public function getRowPrenda($id){
        $id = (int)$id;
        $row = $this->find($id)->current();
        return $row;
    }

}

