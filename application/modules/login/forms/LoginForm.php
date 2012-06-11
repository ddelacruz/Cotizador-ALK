<?php

class Login_Form_LoginForm extends Zend_Form
{
   public $elementDecorators = array(
        'ViewHelper',
        'FormElements',
        'Errors',
        array('HtmlTag', array('tag' => 'div', 'class'=>'divLogin')),
    );
    public $elementDecorators1 = array(
        'ViewHelper',
        'FormElements',
        'Errors',
        array('HtmlTag', array('tag' => 'div', 'class'=>'botonLogin')),
    );
    
    public function __construct($options=null) {
        parent::__construct($options);
            $this->setDisableLoadDefaultDecorators(true);

            $this->setDecorators(array(
            array('ViewScript', array('viewScript' => 'form/_login.phtml')),
            'Form'
            ));        
            $this->setMethod('post');         
            $this->addElement('text','us_nick',array(
                'decorators' => $this->elementDecorators,
                'class'    =>'span3 inputLogin',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese su nombre'))))
            ));
         
            $this->addElement('password','us_clave',array(
                'decorators' => $this->elementDecorators,
                 'class'    =>'span3 inputLogin',
                'required'=>'true',
                'validators' =>array(array('NotEmpty',true, array('messages'=> array(Zend_Validate_NotEmpty::IS_EMPTY=>'Ingrese su email'))))
            ));
         

         $this->addElement('submit','login',array(
             'decorators' => $this->elementDecorators1,
             'class'    =>'btnLogin',
         ));
         $this->getElement('login')->setLabel(' ');
    }
}


