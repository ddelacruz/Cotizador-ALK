<?php

class Default_Model_TbTelas extends Zend_Db_Table_Abstract
{
    protected $_name = 'telas';
    protected $_primary = 'te_id';
    
    public function listarTelas(){
        return $this->fetchAll();
    }
    
    public function guardarTelas($data, $id=null){
        
        if(is_null($id)){
            $row = $this->createRow();
        }else{
            $row = $this->getRowTela($id);
        }
        $row->setFromArray($data);
        return $row->save();
    }

    public function getRowTela($id){
        $id = (int)$id;
        $row = $this->find($id)->current();
        return $row;
    }

}

