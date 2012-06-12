<?php

class Default_Form_ClientesForm extends Zend_Form
{

    public $elementDecorators = array(
        'ViewHelper',
        'FormElements',
        'Errors',
        array('HtmlTag', array('tag' => 'td', 'class'=>'tdTableNuevo')),
    );
    public $elementDecorators1 = array(
        'ViewHelper',
        'FormElements',
        'Errors',
        array('HtmlTag', array('tag' => 'td', 'class'=>'botonTable', 'colspan' => 2, 'align' => 'center')),
    );
    
    public function __construct($options=null) {
        parent::__construct($options);
            $this->setDisableLoadDefaultDecorators(true);

            $this->setDecorators(array(
            array('ViewScript', array('viewScript' => 'form/_clientes.phtml')),
            'Form'
            ));        
            $this->setMethod('post');   
//            $this->setAttrib('enctype', 'multipart/form-data');
            $this->addElement('text','cl_ruc',array(
                'decorators' => $this->elementDecorators,
                'class'    =>'span4',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el RUC del Cliente'))))
            ));
            $this->addElement('text','cl_razon_social',array(
                'decorators' => $this->elementDecorators,
                'class'    =>'span8',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese la Razón Social'))))
            ));
         
            $this->addElement('text','cl_direccion',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span8',
//                'required'=>'true',
//                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el precio'))))
            ));
            $this->addElement('text','cl_telefono',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span3',
//                'required'=>'true',
//                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el precio'))))
            ));
            
            $this->addElement('text','cl_contacto',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span8',
//                'required'=>'true',
//                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el precio'))))
            ));
         
            $this->addElement('text','cl_email',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span8',
//                'required'=>'true',
//                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el precio'))))
            ));
            
                       
         $this->addElement('submit','guardar',array(
             'decorators' => $this->elementDecorators1,
             'class'    =>'btn primary',
             'label'    => 'Guardar'
         ));
         
    }


}

