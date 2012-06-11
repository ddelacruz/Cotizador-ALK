<?php

class Default_Form_PrendasForm extends Zend_Form
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
            array('ViewScript', array('viewScript' => 'form/_prendas.phtml')),
            'Form'
            ));        
            $this->setMethod('post');   
            $this->setAttrib('enctype', 'multipart/form-data');
            $this->addElement('text','pr_nombre',array(
                'decorators' => $this->elementDecorators,
                'class'    =>'span6',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese un nombre de tela'))))
            ));
         
            $this->addElement('text','pr_metraje',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span3',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese el precio'))))
            ));
         
            $this->addElement('file','pr_foto',array(                
                 'class'    =>'span9'                
            ));
            $this->getElement('pr_foto')->removeDecorator('HtmlTag');
         $this->addElement('submit','guardar',array(
             'decorators' => $this->elementDecorators1,
             'class'    =>'btn primary',
             'label'    => 'Guardar'
         ));
         
    }


}

