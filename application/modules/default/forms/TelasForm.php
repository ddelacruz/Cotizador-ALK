<?php

class Default_Form_TelasForm extends Zend_Form
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
            array('ViewScript', array('viewScript' => 'form/_telas.phtml')),
            'Form'
            ));        
            $this->setMethod('post');         
            $this->addElement('text','te_nombre',array(
                'decorators' => $this->elementDecorators,
                'class'    =>'span12',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese un nombre de tela'))))
            ));
         
            $this->addElement('text','te_precio',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span3',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el precio'))))
            ));
         
            $this->addElement('textarea','te_descripcion',array(
                'decorators' => $this->elementDecorators,
                'class'    =>'span12',
                'rows'      => 3,
            ));

         $this->addElement('submit','guardar',array(
             'decorators' => $this->elementDecorators1,
             'class'    =>'btn primary',
             'label'    => 'Guardar'
         ));
         
    }


}

